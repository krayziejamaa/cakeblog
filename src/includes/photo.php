<?
class Photo extends database_object
{

    protected static $database_photos_table = "photos";
    protected static $database_photos_table_fields = array('photo_id', 'title', 'caption', 'description', 'filename', 'alternate_text', 'type', 'size');

    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public $array_errors_upload = array(
        UPLOAD_ERR_OK           => "There is no error",
        UPLOAD_ERR_INI_SIZE        => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE      => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION    => "A PHP extension stopped the file upload."
    );

    public function set_files($file)
    {
        //handle error (no file)
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "No file was uploaded";
            return false;
        } elseif ($file['error'] != 0) {

            //otherwise if error we save the error in the array error
            $this->errors[] = $this->error_in_upload_array[$file['error']];
            return false;
        } else {

            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }
}
