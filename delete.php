<?php
include 'func.php';
include 'includes/header.php';
$id = $_GET['id'];
$requestQuery = "SELECT * FROM posts WHERE id = $id";
$deleteQuery = "DELETE FROM posts WHERE id = $id";
$results = query($requestQuery);
foreach($results as $result){
  unlink("assets/pict/".$result['filename']);
}
header("Location: admin.php");
var_dump($results);
query($deleteQuery);
?>


<?php include 'includes/footer.php' ?>