<?php
include __DIR__ . "/../Images.php";
$id = $_POST["id"];

$image_handler = new Images();
$json_set_result = $image_handler->get_json_of($id);
echo $json_set_result;
?>