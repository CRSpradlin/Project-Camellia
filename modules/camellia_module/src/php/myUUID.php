<?php
require __DIR__ . '/vendor/autoload.php';
use Ramsey\Uuid\Uuid;

class myUUID{
    function getUUID(){
        $uuid = Uuid::uuid4();
        return $uuid->toString();
    }
}
?>