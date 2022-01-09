<?php 
session_start();
if(!isset($_SESSION['login'])){
  header("Location:login.php");
}
include 'func.php';
include 'includes/header.php';
$query = "SELECT * FROM posts";
$results = query($query);
?>
<div class="container">
<h4 class="me-auto">
  <a href="logout.php">Logout</a>
</h4>
  <table class="w-75">
    <tr>
      <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Category Id</th>
    <th>Image</th>
    <th>Action</th>
  </tr>
  <?php foreach($results as $result):?>
    <tr>
      <td><?= $result['id'] ?></td>
      <td><?= $result['title'] ?></td>
      <td><?= $result['description'] ?></td>
      <td><?= $result['category_id'] ?></td>
      <td>
        <img style="width: 175px;height:100px;" src="assets/pict/<?= $result['filename'] ?>" alt="">
      </td>
      <td>
        <a href="delete.php?id=<?= $result['id'] ?>">Delete</a>/
        <a href="edit.php?id=<?= $result['id'] ?>">Edit</a>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
</div>
  
  <?php include 'includes/footer.php' ?>