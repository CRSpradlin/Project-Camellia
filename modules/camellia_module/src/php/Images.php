<?php
include __DIR__ . "/Connection.php";
class Images{
    private $database;

    function __construct(){
        $this->database = new Connection();
    }

    function set_json_of(string $id, string $json){
        $current_val = $this->get_json_of($id);
        $result = 1;
        if($current_val === ""){
            $this->database->query("UPDATE camelliaModuleDB SET imageData = '$json' WHERE id = '$id'");
        } else {
            $result = 0;
        }
        return $result;
    }

    function get_json_of(string $id){
        $img_data = $this->database->query("SELECT imageData FROM camelliaModuleDB WHERE id = '$id'");
        $result = array();
        if ($img_data->num_rows > 0) {
            while($row = $img_data->fetch_assoc()) {
              array_push($result, $row['imageData']);
            }
        }
        return $result[0];
    }

    function get_all(){
        $result = array();
        $all_images = $this->database->query("SELECT id, imageData FROM camelliaModuleDB");
        if ($all_images->num_rows > 0) {
            while($row = $all_images->fetch_assoc()) {
              array_push($result, $row);
            }
        }
        return json_encode($result);
    }
}
?>