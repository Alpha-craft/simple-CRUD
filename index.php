<?php 
include 'includes/header.php' ;
include 'func.php';
$query = "SELECT * FROM posts";
$datas = query($query);
?>

<div class="container w-100">
  <table>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Img</th>
    </tr>
    <?php foreach($datas as $data): ?>
      <tr>
        <td><?= $data['title'] ?></td>
        <td><?= $data['description'] ?></td>
        <td>
          <img style="width: 175px;height:100px;" src="assets/pict/<?= $data['filename'] ?>" alt="">
        </td>
      </tr>
      <?php endforeach; ?>
  </table>
</div>
<?php include 'includes/footer.php' ?>