<?php

class Model_Send_Image extends Model
{

    public $error   = [];
    public $success = "<h2 class='success'>Success!</h2>";
    private $result = [];

    public function __construct() {
        $this->db = new Database_Send_Image();
    }

	public function set_data($data)
    {
        $filePath   = $data['tmp_name'];
        $errorCode  = $data['error'];

        $name = md5_file($filePath);

        $extension = image_type_to_extension($image[2]);

        $format = str_replace('jpeg', 'jpg', $extension);
        $src    = $_SERVER['DOCUMENT_ROOT'] . '\\images\\' . $name . $format;
        if (!move_uploaded_file($filePath, $src)) {
            die('При записи изображения на диск произошла ошибка.');
        }
        $src        = explode('\\', $src);
        $user_id    = $_SESSION['userid'];
        if($this->db->hasImage($user_id))
        {
            $this->db->updateImage('images/' . array_pop($src), $user_id);
        }
        else
        {
            $this->db->saveImage('images/' . array_pop($src), $user_id);
        }
    }

    public function verificateData($data)
    {
        $filePath   = $data['tmp_name'];
        $errorCode  = $data['error'];
        if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

            $this->error = [
                UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
                UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
                UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
                UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
                UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
            ];

            $this->error = 'При загрузке файла произошла неизвестная ошибка.';

            $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

            die($outputMessage);
        }

        $fi = finfo_open(FILEINFO_MIME_TYPE);

        $mime = (string)finfo_file($fi, $filePath);

        if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');

        $image = getimagesize($filePath);

        $limitBytes  = 1024 * 1024 * 5;
        $limitWidth  = 3280;
        $limitHeight = 2820;

        if (filesize($filePath) > $limitBytes) die('Размер изображения не должен превышать 5 Мбайт.');
        if ($image[1] > $limitHeight)          die('Высота изображения не должна превышать 768 точек.');
        if ($image[0] > $limitWidth)           die('Ширина изображения не должна превышать 1280 точек.');

        return $data;
    }

    public function setHashToPass($data)
    {
        $data['password']       = password_hash($data['password'], PASSWORD_DEFAULT);
        unset($data['password2']);
        return $data;
    }
}