<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <title>Home | Fashionzilla</title>
  <link rel="stylesheet" href="css/index.css" type="text/css">
  <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
  <link rel='stylesheet' href='../business/css/themify-icons.css' type='text/css'>
  <link rel='stylesheet' href='../business/css/owl.carousel.min.css' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../business/js/jquery.slicknav.js"></script>
  <script src="../business/js/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" referrerpolicy="no-referrer"></script>
</head>
<body>
  <?php
  include 'nav_bar.php';
  include '../business/config.php';
  ?>
  <section id = "intro">
    <section class="hero-section">
    <div class="hero-items owl-carousel">

        <?php

        $get_slides = "select * from slider LIMIT 0,1";
        $run_slider = mysqli_query($con, $get_slides);

        while ($row_slides = mysqli_fetch_array($run_slider)) {

            $slide_name = $row_slides['slide_name'];
            $slide_image = $row_slides['slide_image'];
            $slide_heading = $row_slides['slide_heading'];
            $slide_text = $row_slides['slide_text'];

            echo "

            <div class='single-hero-items set-bg' data-setbg='img/$slide_image'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-5'>
                            <h1>$slide_heading</h1>
                            <p>$slide_text
                            </p>
                            <a href='shop.php' class='primary-btn'>Shop Now</a>
                        </div>
                    </div>
                    <div class='off-card'>
                        <h2>Up to <span>60%</span>off</h2>
                    </div>
                </div>
            </div>
                ";
        }


        $get_slides = "select * from slider LIMIT 1,2";
        $run_slider = mysqli_query($con, $get_slides);

        while ($row_slides = mysqli_fetch_array($run_slider)) {

            $slide_name = $row_slides['slide_name'];
            $slide_image = $row_slides['slide_image'];
            $slide_heading = $row_slides['slide_heading'];
            $slide_text = $row_slides['slide_text'];

            echo "
            <div class='single-hero-items set-bg' data-setbg='img/$slide_image'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-5'>
                            <h1 style='color: white;'>$slide_heading</h1>
                            <p style='color: white;'>$slide_text
                            </p>
                            <a href='shop.php' class='primary-btn'>Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>";
        }

        ?>

    </div>
</section>
    </section>
    <section id="products">
    <section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-slider owl-carousel">
                    <?php
                    $get_products = "select * from products where cat_id=1 order by RAND() LIMIT 7";
                    $run_products = mysqli_query($con, $get_products);



                    while ($row_products = mysqli_fetch_array($run_products)) {

                        $products_id = $row_products['products_id'];
                        $product_title = $row_products['product_title'];
                        $product_price = $row_products['product_price'];
                        $product_img1 = $row_products['product_img1'];

                        echo "

                        <div class='product-item'>
                        <div class='pi-pic' style='max-height:300px'>
                            <img src='img/products/$product_img1' alt='$product_title'>
                            <ul>
                                <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:rgba(33, 36, 37, 1);color:white'>View Details</a></li>
                            </ul>
                        </div>
                        <div class='pi-text'>
                            <a href='#'>
                                <h5>$product_title</h5>
                            </a>
                            <div class='product-price'>
                            ₹ $product_price
                            </div>
                        </div>
                    </div>

                    ";}
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
</section>
<section id = "story">
      <div class = "os">
        our story
      </div>
      <text><center>Shopping online has never been more rewarding. Our selection of fashion goods includes stunning pieces for every occasion, size or budget. Our retail experts go far and beyond to create our breathtaking, creative collections, and our customer service team will make sure that your expectations are not just met, but exceeded.
      <br><br>
      Thanks to our innovative and service-oriented approach, FashionZilla has been highly successful since day one. Browse our site and get in touch if you need any assistance. Happy shopping!</center></text>
    </section>
    <section>
    </section>
    <section>
    </section>
    <section id = "map">
      <script src = "js/map.js"></script>
      <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6UbdAZsIMIrXwNMKHhb-A3p83brgRCCs&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    </section>
    <div class = "em">
    </div>
    <?php
      include 'footer.php';
      if (isset($_GET['stat'])) {

      echo "
          <script>
                  bootbox.alert({
                      message: 'Welcome! You are logged in.',
                      backdrop: true
                  });
          </script>";
      }
    ?>
</body>
</html>
