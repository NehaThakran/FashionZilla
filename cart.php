<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cart | Fashionzilla</title>
    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <link rel="stylesheet" href="css/cart.css" type="text/css">
  </head>
  <body>
    <?php
        require_once 'nav_bar.php';
     ?>
     <section id="cart" >
       <div class="fpage">
         <div class="cart-items">
           <div class="uper">
             My Cart
           </div>
           <?php
          $c_id = $_SESSION['customer_email'];
          $get_items = "select * from cart where c_id = '$c_id' ORDER BY date DESC";
          $run_itemss = mysqli_query($con, $get_items);
          $countrows =  mysqli_num_rows($run_itemss);
          if ($countrows == 0) {
              echo  "
          <div class='card col-md-3 col-10' style='margin:0 auto; border-radius:25px 5px;box-shadow: inset -12px -8px 40px #e5e5e5;'>
              <div class='card-body'>
                 <h5 style='font-family:brandon;text-align:center;font-weight:500'> No items in Cart </h5>
              </div>
          </div>
              ";
          } else {
              echo "
              <thead style='font-size: larger;'>
                                  <tr>
                                      <th>Image</th>
                                      <th class='p-name'>Product Name</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>Total</th>
                                      <th></th>
                                  </tr>
                              </thead>
              ";
              while ($row_items = mysqli_fetch_array($run_itemss)) {
                  $p_id = $row_items['products_id'];
                  $pro_qty = $row_items['qty'];
                  $get_item = "select * from products where products_id = '$p_id'";
                  $run_item = mysqli_query($con, $get_item);
                  while ($row_item = mysqli_fetch_array($run_item)) {
                      $pro_id = $row_item['products_id'];
                      $pro_name = $row_item['product_title'];
                      $pro_price = $row_item['product_price'];
                      $pro_img1 = $row_item['product_img1'];
                      $pro_total_p = $pro_price * $pro_qty;
                  }
                  echo "
              <tr style='border-bottom: 0.5px solid #ebebeb'>
                 <td class='cart-pic first-row'><img src='img/products/$pro_img1' alt='$pro_name' style='max-height:100px'></td>
                 <td class='cart-title first-row'>
                     <h5><a href='product.php?product_id=$pro_id' style='color:black;font-weight:bold'>$pro_name</h5>
                 </td>
                 <td class='p-price first-row'>₹ $pro_price</td>
                 <td class='qua-col first-row'>
                     <div class='quantity'>
                         <div class='pro-qty'>
                             <input id = 'qqty' type='text' value='$pro_qty'>
                         </div>
                     </div>
                 </td>
                 <td class='total-price first-row'>₹ $pro_total_p</td>
                 <td class='close-td first-row'><a href='shopping-cart.php?del=$pro_id'><i class='ti-close' style='color:black'></i></a></td>
             </tr>
         ";
              }
          }
?>
         </div>
         <div class="total">
           <div class="uper">
             Order Summary
           </div>
           <div class="subtotal">
             <dl>
               <dt>Subtotal</dt>
               <dd>₹</dd>
             </dl>
             <dl>
               <dt>Shipping</dt>
               <dd>FREE</dd>
             </dl>
           </div>
           <div class="final">
             <dl>
               <dt>Total</dt>
               <dd>₹</dd>
             </dl>
           </div>
           <button class="chkot">
             <g>Checkout</g>
           </button>
         </div>
       </div>
     </section>
     <?php
        require_once 'footer.php';
      ?>
  </body>
  </html>

  <?php
  if (isset($_GET['del'])) {
      $p_id = $_GET['del'];
      $query = "Delete from cart where products_id='$p_id'";
      $run_query = mysqli_query($con, $query);
      echo "<script>window.open('shopping-cart.php','_self')</script>";
  }
  if (isset($_GET['upd'])) {
      $p_id = $_GET['del'];
      $query = "Delete from cart where products_id='$p_id'";
      $run_query = mysqli_query($con, $query);
      echo "<script>window.open('shopping-cart.php','_self')</script>";
  }
  ?>
