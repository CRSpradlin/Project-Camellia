<?php
include __DIR__ . "/../Uploader.php";

$uploader = new Uploader($_FILES, $_POST);
$result = $uploader->upload();
$result_json = json_encode($result);

echo $result_json;
?>