<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Shop | Fashionzilla</title>
    <link rel="stylesheet" href="css/shop.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
    <?php
      require_once ("nav_bar.php");
    ?>
    <section id="shop">
      <div class="col-lg-9 order-1 order-lg-2">
        <div class="product-list">
                      <div class="row">

                          <?php

                          if (!isset($_GET['p_cat_id'])) {

                              if (!isset($_GET['cat_id'])) {

                                  $per_page = 6;

                                  if (isset($_GET['page'])) {
                                      $page = $_GET['page'];
                                  } else {
                                      $page = 1;
                                  }

                                  $start_from = ($page - 1) * $per_page;
                                  $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                                  $run_products = mysqli_query($con, $get_products);


                                  while ($row_products = mysqli_fetch_array($run_products)) {



                                      $products_id = $row_products['products_id'];
                                      $product_title = $row_products['product_title'];
                                      $product_price = $row_products['product_price'];
                                      $product_img1 = $row_products['product_img1'];

                                      echo "

                                      <div class='col-lg-4 col-sm-6'>
                                      <div class='product-item'>
                                          <div class='pi-pic' style='-he-height:250px'>
                                              <img src='img/products/$product_img1' alt='$product_title'>
                                              <ul>
                                                  <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:rgba(33, 36, 37, 1);color:#FFFFFF'>View Details</a></li>
                                              </ul>
                                          </div>
                                          <div class='pi-text'>
                                              <div class='catagory-name'></div>
                                              <a href='product.php?product_id=$products_id'>
                                                  <b>$product_title</b>
                                              </a>
                                              <div class='product-price'>
                                              ₹ $product_price
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  ";
                                  }
                          ?>


                      </div>

                      <div class="row" style="display:flex;justify-content:center; padding:14px">
                          <ul class="pagination">

                      <?php

                                  $query = "select * from products";
                                  $result = mysqli_query($con, $query);

                                  $total_records = mysqli_num_rows($result);

                                  $total_pages = ($total_records / $per_page);

                                  $total_pages = ceil($total_pages);

                                  if ($total_pages <= 1) {
                                      echo "";
                                  } else {

                                      for ($i = 1; $i < $total_pages; $i++) {
                                          echo "
                              <li class='page-item'><a class='page-link' href='shop.php?page=" . $i . "'>" . $i . "</a></li>
                              ";
                                      }

                                  }
                              }
                          }
                      ?>
                          </ul>
                      </div>
                      <div class="row">
                          <?php
                          if (isset($_GET['p_cat_id']))
                          {
                            $p_cat_id = $_GET['p_cat_id'];
                            $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
                            $run_p_cat = mysqli_query($con, $get_p_cat);
                            $row_p_cat = mysqli_fetch_array($run_p_cat);
                            $p_cat_title = $row_p_cat['p_cat_title'];
                            $p_cat_desc = $row_p_cat['p_cat_desc'];
                            $get_products = "select * from products where p_cat_id='$p_cat_id'";
                            $run_products = mysqli_query($con, $get_products);
                            $count = mysqli_num_rows($run_products);
                            if ($count == 0) {

                                echo "
                                    <div class='card' style='font-weight:bold; color:#000000'>
                                        <div class='card-body'>No Products Available</div>
                                    </div>
                                        ";
                            } else {
                                while ($row_products = mysqli_fetch_array($run_products)) {

                                    $products_id = $row_products['products_id'];
                                    $product_title = $row_products['product_title'];
                                    $product_price = $row_products['product_price'];
                                    $product_img1 = $row_products['product_img1'];
                                    echo "
                                    <div class='col-lg-4 col-sm-6'>
                                    <div class='product-item'>
                                        <div class='pi-pic' style='max-height:250px'>
                                            <img src='img/products/$product_img1' alt='$product_title'>
                                            <ul>
                                                <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:rgba(33, 36, 37, 1);color:#FFFFFF'>View Details</a></li>
                                            </ul>
                                        </div>
                                        <div class='pi-text'>
                                            <div class='catagory-name'></div>
                                            <a href='product.php?product_id=$products_id'>
                                                <b>$product_title</b>
                                            </a>
                                            <div class='product-price'>
                                            ₹ $product_price
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ";
                                }
                            }
                        }
                        if (isset($_GET['cat_id']))
                        {
                          $cat_id = $_GET['cat_id'];
                          $get_cat = "select * from category where cat_id='$cat_id'";
                          $run_cat = mysqli_query($con, $get_cat);
                          $row_cat = mysqli_fetch_array($run_cat);
                          $p_cat_title = $row_cat['cat_title'];
                          $p_cat_desc = $row_cat['cat_desc'];
                          $get_products = "select * from products where cat_id='$cat_id'";
                          $run_products = mysqli_query($con, $get_products);
                          $count = mysqli_num_rows($run_products);
                          if ($count == 0) {

                              echo "
                                  <div class='card' style='font-weight:bold; color:#000000'>
                                      <div class='card-body'>No Products Available</div>
                                  </div>

                                      ";
                          } else {
                              while ($row_products = mysqli_fetch_array($run_products)) {

                                  $products_id = $row_products['products_id'];
                                  $product_title = $row_products['product_title'];
                                  $product_price = $row_products['product_price'];
                                  $product_img1 = $row_products['product_img1'];
                                  echo "
                                  <div class='col-lg-4 col-sm-6'>
                                  <div class='product-item'>
                                      <div class='pi-pic' style='max-height:250px'>
                                          <img src='img/products/$product_img1' alt='$product_title'>
                                          <ul>
                                              <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:rgba(33, 36, 37, 1);color:#FFFFFF'>View Details</a></li>
                                          </ul>
                                      </div>
                                      <div class='pi-text'>
                                          <div class='catagory-name'></div>
                                          <a href='product.php?product_id=$products_id'>
                                              <b>$product_title</b>
                                          </a>
                                          <div class='product-price'>
                                          ₹ $product_price
                                          </div>
                                      </div>
                                  </div>
                              </div>
                      ";
                              }
                          }
                      }
                          ?>
                      </div>
                  </div>
                </div>
    </section>
    <?php require_once 'footer.php'; ?>
  </body>
</html>
