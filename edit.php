<?php
include 'func.php';
include 'includes/header.php';
$id = $_GET['id'];
$categoryQuery = "SELECT * FROM category";
$query = "SELECT * FROM posts WHERE id = $id";
$results = query($query);
$catResults = query($categoryQuery);
if(isset($_POST['submit'])){
  $filename = upload();
  $title = $_POST['title'];
  $description = $_POST['description'];
  $categoryId = $_POST['category_id'];
  $editQuery = "UPDATE `posts` SET `title` = '$title', `description` = '$description', `category_id` = '$categoryId',filename = '$filename' WHERE id = $id;";
  $test = query($editQuery);
  var_dump($test);
  header("Location:admin.php");
}
?>
<div class="container">
  <div class="d-block">
    <div class="border m-auto rounded-3 p-3">
      <h3 class="text-center p-3">Edit Post</h3>
      <form action="" method="post" enctype="multipart/form-data">
        <?php foreach($results as $result): ?>
        <div class="row mb-3">
          <div class="col-3">
            <label for="" class="form-label">Title</label>
          </div>
          <div class="col-9">
            <input type="text" class="form-control" name="title" value="<?= $result['title'] ?>" id="">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="" class="form-label">Description</label>
          </div>
          <div class="col-9">
            <input type="text" class="form-control" name="description" value="<?= $result['description'] ?>" id="">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="" class="form-label">Category</label>
          </div>
          <div class="col-9">
            <select name="category_id" id="">
              <?php foreach($catResults as $category): ?>
              <option value="<?= $category['id'] ?>"><?= $category['category_title'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <?php endforeach ?>
        <div class="mb-3 p-3">
          <label for="" class="form-label"></label>
          <input class="form-control" value="<?= $result['filename'] ?>" type="file" name="gambar" id="">
          <img class="d-block m-auto my-3" style="width: 500px;height: 270px;" src="assets/pict/<?= $result['filename'] ?>" alt="">
        </div>
        <div class="d-flex mb-3 justify-content-center">
          <button type="reset" class="btn btn-outline btn-danger mx-3">Reset</button>
          <button type="submit" class="btn btn-outline btn-success" name="submit">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>