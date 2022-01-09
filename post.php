<?php
include 'func.php';
include 'includes/header.php';
$options = query("SELECT * FROM category");
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $categoryId = $_POST['category_id'];
  $filename = upload();
  $postQuery = "INSERT INTO posts (title,description,category_id,filename) VALUES ('$title','$description','$categoryId','$filename')";
  $result = query($postQuery);
  var_dump($result);
  header("Location:admin.php");
}
?>
<div class="container">
  <div class="d-block">
    <div class="border bg-light rounded-3 m-auto">
      <h3 class="text-center p-3">Post</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row p-3">
          <div class="col-2">
            <label for="" class="form-label">Title</label>
          </div>
          <div class="col-10">
            <input name="title" type="text" class="form-control">
          </div>
        </div>
        <div class="row p-3">
          <div class="col-2">
            <label for="" class="form-label">Description</label>
          </div>
          <div class="col-10">
            <input name="description" type="text" class="form-control">
          </div>
        </div>
        <div class="row p-3">
          <div class="col-2">
            <label for="" class="form-label">Category</label>
          </div>
          <div class="col-10">
            <select name="category_id" id="">
              <?php foreach($options as $option): ?>
              <option value="<?= $option['id']?>"><?= $option['category_title'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="mb-3 p-3">
          <label for="gambar" class="form-file"></label>
          <input type="file" name="gambar" class="form-control" id="gambar" required>
        </div>
        <div class="d-flex justify-content-center mb-3">
          <button class="btn btn-outline btn-danger mx-2" type="reset">Reset</button>
          <button class="btn btn-outline btn-success" type="submit" name="submit">Post!</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>