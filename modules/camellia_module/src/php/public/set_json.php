<?php
include __DIR__ . "/../Images.php";
$result_json = $_POST["json_results"];
$id = $_POST["id"];

$image_handler = new Images();
$json_set_result = $image_handler->set_json_of($id, $result_json);
echo $json_set_result;
?>