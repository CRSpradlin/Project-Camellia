<?php
    include __DIR__ . "/../PlantNet.php";
    $img_id = $_POST["imgId"];
    $organ = $_POST["organ"];

    $plantnet_handler = new PlantNet();
    $json_set_result = $plantnet_handler->get_api_response($img_id, $organ);
    echo $json_set_result;
?>