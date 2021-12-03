<?php
include ('config.php');
if (!(isset($_SESSION['customer_email']))) {
    $_SESSION['customer_email'] = 'unset';
} else {
    return;
}
?>
<header>
  <link rel="stylesheet" href="css/nav_bar.css" type="text/css">
<div class = "main">
  <div class = "xyz" id = "mn">
    <div class = "upr">
      <div class = "tpl">
        <span id = "lgo"><img src="img/logo.png"></span></br>
        <span id = "login">
        <?php
        if ($_SESSION['customer_email'] == 'unset') {
            echo "<a href='login.php' id='login-btn'>Login</a>";
        } else {
            echo "<a href='logout.php' id='logout-btn'>LogOut</a>";
        }
        ?>
        </span>
      </div>
    <span id = "lgo-text"><a href = "../fashionzilla">FASHIONZILLA</a></span>
  </div>
    <ul>
    <li><a href="shop.php">Shop</a></li>
    <!-- <li><a href="#">New Collection</a></li> -->
    <li><a href="faq.php">FAQ</a></li>
    <li><a href="sp.php">Store Policies</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <span id="rt-btn" style="visibility:   <?php if ($_SESSION['customer_email'] == 'unset') {
                                                                                    echo "hidden";
                                                                                } ?>">
        <a id="cart-btn" href="#">
            <img id="cart-logo" onclick = "openNav();" src="img/cart-icon.png">
            <i class="icon_bag_alt"></i>
            <span class="num"><?php
            $c_id = $_SESSION['customer_email'];

            $get_items = "select * from cart where c_id = '$c_id'";
            $run_items = mysqli_query($con, $get_items);

            $count_items = mysqli_num_rows($run_items);

            echo $count_items; ?></span>
        </a>
    </span>
    </ul>
  </div>
</div>
<div id="mySidenav" class="sidenav">
<div class="upper">
  <button href="javascript:void(0)" class = "bton" onclick="closeNav()">
    <span class ="arrow"></span>
  </button>
  <b>Cart</b>
</div>
<div class="cart-content">
  <div class="select-items">
    <table>
      <tbody>
        <?php
          $c_id = $_SESSION['customer_email'];
          $get_items = "select * from cart where c_id = '$c_id' ORDER BY date DESC LIMIT 0,2";
          $run_items = mysqli_query($con, $get_items);
          if (mysqli_num_rows($run_items) == 0) {
              echo  "


              <p style='text-align:center; font-weight:400;color:#000000;position:sticky;font-family:brandon; font-size:20px;'>Cart Empty </p>


              ";
          } else {

              while ($row_items = mysqli_fetch_array($run_items)) {
                  $p_id = $row_items['products_id'];
                  $pro_qty = $row_items['qty'];

                  $get_item = "select * from products where products_id = '$p_id' ORDER BY date DESC";
                  $run_item = mysqli_query($con, $get_item);

                  while ($row_item = mysqli_fetch_array($run_item)) {

                      $pro_name = $row_item['product_title'];
                      $pro_price = $row_item['product_price'];
                      $pro_img1 = $row_item['product_img1'];

                      $pro_total_p = $pro_price * $pro_qty;
                  }

                  echo "
              <tr>
              <td class='si-pic'><img src='img/products/$pro_img1' alt='$pro_name' style='max-height:70px'></td>
              <td class='si-text'>
                  <div class='product-selected'>
                      <p>₹ $pro_price x $pro_qty</p>
                      <h6>$pro_name</h6>
                  </div>
              </td>
              <td class='si-close'>
              <a href='shopping-cart.php?delcart=$p_id'> <i class='ti-close' style='color:black'></i></a>
              </td>
          </tr>
          ";
              }
          }
         ?>
      </tbody>
    </table>
  </div>
  <div class="select-total">
    <span>Subtotal</span>
    <h5><?php
    $c_id = $_SESSION['customer_email'];
    $total = 0;
    $get_items = "select * from cart where c_id = '$c_id'";
    $run_items = mysqli_query($con, $get_items);
    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id'];
        $pro_qty = $row_items['qty'];
        $get_price = "select * from products where products_id = '$p_id'";
        $run_price = mysqli_query($con, $get_price);
        while ($row_price = mysqli_fetch_array($run_price)) {

            $sub_price = $row_price['product_price'] * $pro_qty;
            $total += $sub_price;
        }
    }
    echo "₹ " . $total;
    ?></h5>
  </div>
</div>
<div class="lower">
  <button class="crt-btn">
    <a href="cart.php" style="color:#FFFFFF;font-family:brandon;font-size:18px;font-stretch:100%;font-weight:400;line-height:31.5px;text-align:center;">View Cart</a>
  </button>
</div>
</div>
<script type="text/javascript">
function openNav()
{
  document.getElementById("mySidenav").style.width = '350px';
  document.body.style.backgroundColor = "rgba(0,0,0,0)";
}
function closeNav()
{
  document.getElementById("mySidenav").style.width = "0";
  document.body.style.backgroundColor = "white";
}
function rotate()
{
document.querySelector("").style.transform = "rotate(-180deg)";
}

</script>
</header>
