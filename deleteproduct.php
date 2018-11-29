<?
if (isset($_GET['id'])) {
  $id = $_GET['id'];
   $conn = mysqli_connect("localhost", "dustiqw271_usertest", "@z7gvbm8i@", "dustiqw271_test");
   $deleteproduct = "DELETE FROM `products` WHERE `products`.`id` = ".$id.";";
   $deleteproductcon = $conn->query($deleteproduct);
   header('Location: index.php?message=Product with id '.$id.' has been deleted');
}
?>
