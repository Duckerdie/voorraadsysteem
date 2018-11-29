<?
include 'includes/header.php';
include 'includes/productlist.php';

?>
<section class="find">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form class="find-form form-group" action="" method="post">
          <div class="form-group">
            <label for="find-id">Zoeken op id:</label>
            <input class="form-control" type="int" name="find-id" id="find-id" value="">
          </div>
          <div class="form-group">
            <label for="find-name">Zoeken op naam:</label>
            <input class="form-control" type="text" name="find-name" id="find-name" value="">
          </div>
          <input class="btn btn-info" type="submit" name="find-btn" value="Zoeken">
        </form>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row table-responsive">
        <?
        if (isset($_GET['message'])) {
            echo '
            <div class="message col-md-12 alert alert-success">
              '.$_GET['message'].
              '<a class="pull-right" href="index.php"> <i class="fa fa-times" aria-hidden="true"></i> </a>'.
            '</div>';
        }
        ?>
      <div class="col-md-12">
        <table class="table table-striped">
          <thead class="table-dark">
            <tr>
              <td><strong>id</strong></td>
              <td>title</td>
              <td>description</td>
              <td>image</td>
              <td>price</td>
              <td>quantity</td>
              <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
              <td><i class="fa fa-trash" aria-hidden="true"></i></td>
            </tr>
          </thead>
          <tbody>
            <?if (isset($foundproduct)) {
              echo $foundproduct;
            }?>
            <?echo $productlist?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<? include 'includes/footer.php';?>
