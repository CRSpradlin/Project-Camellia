<?php
include __DIR__ . "/Connection.php";
include __DIR__ . "/myUUID.php";

class Uploader{
    private $database;
    private $uuid_construct;

    private $form_file_obj;
    private $form_post_obj;

    private $original_file;
    private $file_name;
    private $target_file;
    private $upload_ok = 1;
    private $target_dir = __DIR__ . "/../../uploads/";
    private $result = array("errors"=>"Errors:", "upload_ok"=>"", "result"=>"", "image_id"=>"");

    // pass in $_FILES and $_POST objects to form_file_obj and form_post_obj respectively.
    function __construct($form_file_obj, $form_post_obj){
        $this->database = new Connection();
        $this->uuid_construct = new myUUID();

        $this->form_file_obj = $form_file_obj;
        $this->form_post_obj = $form_post_obj;

        $this->original_file = basename($this->form_file_obj["file_to_upload"]["name"]);
        $this->file_name = $this->uuid_construct->getUUID() . "." . strtolower(pathinfo($this->original_file, PATHINFO_EXTENSION));
        $this->target_file = $this->target_dir . $this->file_name;
    }

    function upload(){
        $image_type_ext = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));

        if(isset($this->form_post_obj["submit"])){
            $check = getimagesize($this->form_file_obj["file_to_upload"]["tmp_name"]);
            if($check !== false){
                $this->upload_ok = 1;
            } else {
                $this->result["errors"] = $this->result["errors"] . " File is not an image.";
                $this->upload_ok = 0;
            }
        }

        if($this->upload_ok == 0){
            $this->result["errors"] = $this->result["errors"] . " Sorry, your file was not uploaded.";
        } else {
            if(move_uploaded_file($this->form_file_obj["file_to_upload"]["tmp_name"], $this->target_file)) {
                $json = '';
                $database_output = $this->database->query("INSERT INTO camelliaModuleDB (id, imageData) VALUES ('$this->file_name', '$json')");
                $this->result["result"] = $database_output;
                $this->result["image_id"] = $this->file_name;
            } else {
                $this->result["errors"] = $this->result["errors"] . " Sorry, there was an error while uploading your file.";
            }
        }

        $this->result["upload_ok"] = $this->upload_ok;

        return $this->result;
    }
}
?>