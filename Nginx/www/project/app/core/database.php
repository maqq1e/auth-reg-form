<?
class Database
{
	public $db;
	public $statement;
	public function __construct()
	{
		if (!isset($this->db))
		{
			try
			{
				$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->exec("SET NAMES UTF8");
			}
			catch (Exeption $e)
			{
				throw new Exeption($e->getMessage());
			}
		}
	}

	public function query($sql, $vars = array())
	{
		$this->statement = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

		if (!empty($vars))
		{
			foreach ($vars as $key => $var) {
				$this->statement->bindValue($key, $var);
			}
		}

		try
		{
			$return = $this->statement->execute();
		}
		catch (Exeption $e)
		{
			throw new Exeption($this->debugQuery($sql, $vars), $e->getMessage());
		}
		return $return;
	}

	public function getOne($sql, $vars = array())
	{
		$this->query($sql, $vars);
		return $this->statement->fetch(PDO::FETCH_ASSOC);
	}

	public function getAll($sql, $vars = array())
	{
		$this->query($sql, $vars);
		return $this->statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getNum($sql, $vars = array())
	{
		$this->query($sql, $vars);
		return $this->statement->rowCount(PDO::FETCH_ASSOC);
	}

}
?>