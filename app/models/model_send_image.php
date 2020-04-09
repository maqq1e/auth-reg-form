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
        // Generate new file name
        $name = md5_file($filePath);
        // Generate type for file
        $extension = image_type_to_extension($image[2]);
        // Change jpeg to jpg
        $format = str_replace('jpeg', 'jpg', $extension);
        $src    = $_SERVER['DOCUMENT_ROOT'] . '\\images\\' . $name . $format;
        // Switch picture position in file's directory
        if($_SESSION['leng'] == 'ru')
        {
            if (!move_uploaded_file($filePath, $src)) {
                die('При записи изображения на диск произошла ошибка.');
            }
        }
        else
        {
            if (!move_uploaded_file($filePath, $src)) {
                die('Cannot write file in disk.');
            }
        }
        // Save in database url to picture
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
        // Check errors
        if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

            if($_SESSION['leng'] == 'ru')
            {
                $errorMessages = [
                    UPLOAD_ERR_INI_SIZE   => 'Размер файла слишком большой.',
                    UPLOAD_ERR_FORM_SIZE  => 'Размер файла слишком большой.',
                    UPLOAD_ERR_PARTIAL    => 'Произошла проблема с соединением.',
                    UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
                    UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                    UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                    UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
                ];
                $unknownMessage = 'Неизвестная ошибка.';
            }
            else
            {
                $errorMessages = [
                    UPLOAD_ERR_INI_SIZE   => 'File weight is very large.',
                    UPLOAD_ERR_FORM_SIZE  => 'File weight is very large.',
                    UPLOAD_ERR_PARTIAL    => 'Network error. Try again.',
                    UPLOAD_ERR_NO_FILE    => 'File in not upload.',
                    UPLOAD_ERR_NO_TMP_DIR => 'File directory error.',
                    UPLOAD_ERR_CANT_WRITE => 'Cannot write file in disk.',
                    UPLOAD_ERR_EXTENSION  => 'PHP-extension is stop proccess.',
                ];
                $unknownMessage = 'Unknown error.';
            }

            $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

            die($outputMessage);
        }
        // Create soure of FileInfo
        $fi = finfo_open(FILEINFO_MIME_TYPE);
        // Get MIME-type
        $mime = (string)finfo_file($fi, $filePath);
        // Check keyword image (image/jpeg, image/png etc.)
        if($_SESSION['leng'] == 'ru')
        {
            if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');
        }
        else
        {
            if (strpos($mime, 'image') === false) die('You can upload only images.');
        }
        // Get validation
        $image = getimagesize($filePath);
        // Limits of file
        $limitBytes  = 1024 * 1024 * 5;
        $limitWidth  = 3280;
        $limitHeight = 2820;
        // Check params
        if($_SESSION['leng'] == 'ru')
        {
            if (filesize($filePath) > $limitBytes) die('Размер изображения не должен превышать 5 Мбайт.');
            if ($image[1] > $limitHeight)          die('Высота изображения не должна превышать 768 точек.');
            if ($image[0] > $limitWidth)           die('Ширина изображения не должна превышать 1280 точек.');
        }
        else
        {
            if (filesize($filePath) > $limitBytes) die('File wieght must be less 5 Mbait.');
            if ($image[1] > $limitHeight)          die('File height must be less 2820 px.');
            if ($image[0] > $limitWidth)           die('File width must be less 3280 px.');
        }

        return $data;
    }
}