<?php
// TODO: Code Clean-up
// TODO: Use javascript to wait on the php script to fully complete internal image upload
include __DIR__ . "/../Images.php";

$images = new Images();
$database = new Connection();

$result = $database->query("SELECT id, imageData FROM camelliaModuleDB");
//$uuid = getUUID();

//echo $uuid;

if ($result->num_rows > 0) {
  echo "<table><tr><th>id</th><th>json</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["imageData"]."</td></tr>";
  }
  echo "</table>";
} else {
  // $_query = "INSERT INTO camelliaModuleDB (id, imageData) VALUES ('$uuid', '$json')";
  // $result = $database->query($_query);
  echo "nothing retrieved, try uploading an image.";
} 

echo $images->get_all();

?>
