<?
if (isset($_GET['id'])) {

include 'includes/header.php';
if (isset($_POST['edit'])) {
  $conn = new mysqli("localhost", "dustiqw271_usertest", "@z7gvbm8i@", "dustiqw271_test");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $imagepath = $_POST['imagepath'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $sql = "UPDATE `products` SET `title` = '".$title."', `description` = '".$description."', `imagepath` = '".$imagepath."', `price` = '".$price."', `quantity` = '".$quantity."' WHERE `products`.`id` = '".$id."'";
  if ($conn->query($sql) === TRUE) {
      $message = "<div class='alert alert-success'>Record updated successfully</div>";
  } else {
      $message = "<div class='alert alert-danger'>Error updating record: " . $conn->error."</div>";
  }
  header('Refresh: 4');
}
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?
      if (isset($message)) {
        echo $message;
      }
      try {
          $dbh = new PDO('mysql:host=localhost;dbname=dustiqw271_test', 'dustiqw271_usertest', '@z7gvbm8i@');
            foreach($dbh->query('SELECT * FROM products WHERE id = "'.$_GET['id'].'"') as $product) {
              ?>
              <h1>Product <?echo $product['id']?></h1>
              <form class="form-group" action="" method="post">
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" class="form-control" name="title" value="<?echo $product['title']?>" required>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" name="description" value="<?echo $product['description']?>" required>
                </div>
                <div class="form-group">
                  <label for="">Imagepath</label>
                  <input type="text" class="form-control" name="imagepath" value="<?echo $product['imagepath']?>" required>
                </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="number" step="0.01" class="form-control" name="price" value="<?echo $product['price']?>" required>
                </div>
                <div class="form-group">
                  <label for="">Quantity</label>
                  <input type="number" class="form-control" name="quantity" value="<?echo $product['quantity']?>" required>
                </div>
                <input class="btn btn-info" type="submit" name="edit" value="Edit">
              </form>
              <img src="<?echo $product['imagepath']?>" width='100%'>
              <?
            }
          $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
      ?>
    </div>
  </div>
</div>
<?
include 'includes/footer.php';
//isset get id
}
?>
