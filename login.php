<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | Fashionzilla</title>
    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <link rel="stylesheet" href="css/register.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    <?php
      require_once 'nav_bar.php';
    ?>
    <section id = "reg">
      <div class = "user">
        <h1>&ensp;&nbsp;Login</h1>
        <form method="post" class ="dt">
            <div class = "eml">
              Email*<br>
              <input type="text" name="email" placeholder= "Enter your email" required />
            </div>
            <div class = "ps">
              Password*<br>
              <input type="password" name="pass" placeholder= "Enter your password" required />
            </div>
            <div class = "sbt">
            <button type = "submit" name = "submit" value = "Submit">
              <span class = "sub">Submit</span>
            </button>
          </div>
          <h3 class = "login-link">Don't have an account? <a href=register.php>Sign Up </a></h3>
        </form>
      </div>
    </section>
    <?php
      require_once 'footer.php';
    ?>
  </body>
</html>
<?php
include ('config.php');
if (isset($_POST['submit'])) {
    $log_email = $_POST['email'];
    $log_pass = $_POST['pass'];
    $c_id = $log_email;
    $sel_customer = "select * from customer where customer_email = '$log_email' AND customer_pass = '$log_pass'";
    $run_sel_c = mysqli_query($con, $sel_customer);
    $check_customer = mysqli_num_rows($run_sel_c);
    $select_cart = "select * from cart where c_id = '$c_id'";
    $run_sel_cart = mysqli_query($con, $select_cart);
    $check_cart = mysqli_num_rows($run_sel_cart);
    if ($check_customer == 0)
    {
        echo "
        <script>
                bootbox.alert({
                    message: 'Invalid Username or Password',
                    backdrop: true
                });
        </script>";
        exit();
    }
    if ($check_customer == 1 and $check_cart == 0)
    {
        $_SESSION['customer_email'] = $log_email;
        echo  "<script>window.open('index.php?stat=1','_self')</script>";
    }
    else
    {
        $_SESSION['customer_email'] = $log_email;
        // echo  "<script>
        //         bootbox.alert({
        //             message: 'logged in as $log_email',
        //             backdrop: true
        //         });
        /*</script>";*/echo "<script>window.open('cart.php?','_self')</script>";
    }
}
?>
