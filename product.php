<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Product | Fashionzilla</title>
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </head>
  <body>
    <script>
    $("#cartbtn").on('click', function() {
        var atLeastOneChecked = false;
        if (!$("input[name='size']").is(':checked')) {

            $("#msg").html(
                "<span class='alert alert-danger'>" +
                "Please Choose Size </span>");
        } else {
            return;
        }

    });
</script>
    <?php
      include 'nav_bar.php';
     ?>
     <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                        if (isset($_GET['product_id'])) {

                              $product_id = $_GET['product_id'];

                              $get_product_id = "select * from products where products_id='$product_id'";
                              $run_product_id = mysqli_query($con, $get_product_id);

                              $row_products = mysqli_fetch_array($run_product_id);

                              $product_title = $row_products['product_title'];
                              $product_price = $row_products['product_price'];
                              $product_desc = $row_products['product_desc'];
                              $product_img1 = $row_products['product_img1'];
                              $product_img2 = $row_products['product_img2'];


                              $get_p_cat_name = "select p_cat_title from products as P,product_categories as C where P.p_cat_id=C.p_cat_id and products_id=$product_id";
                              $run_get_p_cat_name = mysqli_query($con, $get_p_cat_name);


                              $row_p_cat_name = mysqli_fetch_array($run_get_p_cat_name);


                              $p_cat_name = $row_p_cat_name['p_cat_title'];


                              echo "
                          <div class='col-lg-6' style='margin:0 auto'>
                              <div class='product-pic-zoom  col-md-8' style='max-height:400px;margin: 0 0 30px 0'>
                                  <img class='product-big-img' src='img/products/$product_img1' alt='$product_title'>
                              </div>
                          </div>
                          "?>

                    </div>
                </div>
            </div>
        </div>
                    <?php
                          echo "
                          <div class = 'bdy'>
                          <div class='col-lg-6' style='height:auto'>
                              <div class='product-details'>
                                  <div class='pd-title'>
                                      <h3>$product_title</h3>
                                      <p>$product_desc</p>
                                  </div>
                                  <div class='pd-title'>
                                      <h3>RETURN & REFUND POLICY</h3>
                                      <br/>
                                      <p>Great place to let your customers know what to do in case they are dissatisfied with their purchase. Having a straightforward refund or exchange policy is a great way to build trust and reassure your customers that they can buy with confidence.</p>
                                  </div>
                                  <div class='pd-new'>
                                      <h3>SHIPPING INFO</h3>
                                      <br/>
                                      <p>Great place to add more information about your shipping methods, packaging and cost. Providing straightforward information about your shipping policy is a great way to build trust and reassure your customers that they can buy from you with confidence.</p>
                                  </div>
                              </div>
                            </div>
                              <div class='col-lg-6' style='height:auto; max-width:45%; text-align:center'>
                                  <div class='pd-desc'>
                                      <h4>₹ $product_price</h4>
                                  </div>

                                  <ul class='pd-tags'>
                                      <li><span>CATEGORY&nbsp</span>:&nbsp $p_cat_name</li>
                                  </ul>

                              ";
                          }
                          if (isset($_GET['add_cart'])) {

                          $c_id = $_SESSION['customer_email'];
                          $p_id = $_GET['add_cart'];
                          $qty = $_POST['product_qty'];
                          $size = $_POST['size'];

                          $check_product = "select * from cart where c_id = '$c_id' AND products_id = '$p_id'";
                          $run_check = mysqli_query($con, $check_product);


                          if (mysqli_num_rows($run_check) > 0) {

                          echo "<script>alert('Product already added.')</script>";
                          echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
                          } else {

                          $query = "Insert into cart (products_id, ip_add,qty,size,date,c_id) values('$p_id','$ip_add','$qty','$size',NOW(),'$c_id')";
                          $run_query = mysqli_query($con, $query);


                          echo "<script>alert('Product added to Cart. Keep Shopping.')</script>";
                          echo "<script>window.open('product.php?product_id=$p_id','_self')</script>";
                          }
                          }
                        ?>
                        <form action='product.php?add_cart=<?php if (isset($_GET['product_id'])) {
                                                                $product_id = $_GET['product_id'];
                                                                echo $product_id;
                                                            } ?>' method='post'>

                            <div class="form-group">
                                <div class='quantity'>
                                    <div class='pro-qty'>
                                        <input type='text' value='1' name="product_qty">
                                    </div>
                                </div>
                                <script type="text/javascript">
                                var proQty = $('.pro-qty');
                                proQty.prepend('<span class="dec qtybtn">-</span>');
                                proQty.append('<span class="inc qtybtn">+</span>');
                                proQty.on('click', '.qtybtn', function () {
                                    var $button = $(this);
                                    var oldValue = $button.parent().find('input').val();
                                    if ($button.hasClass('inc')) {
                                        var newVal = parseFloat(oldValue) + 1;
                                    } else {
                                        // Don't allow decrementing below zero
                                        if (oldValue > 1) {
                                            var newVal = parseFloat(oldValue) - 1;
                                        } else {
                                            newVal = 1;
                                        }
                                    }
                                    $button.parent().find('input').val(newVal);
                                });
                                </script>
                            <div class="form-group">
                                <div class='pd-size-choose'>
                                    <div class='sc-item'>
                                        <input type='radio' id='sm-size' class="form-control" name='size' value="Small" required novalidate>
                                        <label for='sm-size'>s</label>
                                    </div>
                                    <div class='sc-item'>
                                        <input type='radio' id='md-size' class="form-control" name='size' value="Medium">
                                        <label for='md-size'>m</label>
                                    </div>
                                    <div class='sc-item'>
                                        <input type='radio' id='lg-size' class="form-control" name='size' value="Large">
                                        <label for='lg-size'>l</label>
                                    </div>
                                    <div class='sc-item'>
                                        <input type='radio' id='xl-size' class="form-control" name='size' value="XL">
                                        <label for='xl-size'>xl</label>
                                    </div>
                                </div>
                                <p id="msg"></p>
                            </div>
                            <script type="text/javascript">
                              $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
                                  $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
                                  $(this).addClass('active');
                              });
                            </script>
                            <?php if ($_SESSION['customer_email'] == 'unset') {
                                echo "
                                <div class='lwer'>
                                <a href='login.php' class='crtbtn' style='margin-top: 20px;'> Add to cart</a>
                                </div>";
                            } else {
                                echo "<button class='crtbtn' id='cartbtn' style='margin-top: 20px;'> Add to cart</button>";
                            }
                            ?>
                        </form>
                  </div>
            </div>
</section>
<?php
  include 'footer.php';
?>
  </body>
</html>
