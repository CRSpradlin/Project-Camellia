<?php
include __DIR__ . "/../Images.php";

$image_handler = new Images();
$json_set_result = $image_handler->get_all();
echo $json_set_result;
?>