<?php
include __DIR__ . "/../Images.php";
$images = new Images();
$result = $images->get_json_of("3b593c75-4c5d-4545-b4fd-bcb3f65268c2.jpg");
echo $result;
if($result==''){
    echo "true";
} else {
    echo "false";
}
?>