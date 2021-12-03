<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Register | Fashionzilla</title>
    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <link rel="stylesheet" href="css/register.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    <?php
      require 'nav_bar.php';
    ?>
    <section id = "reg">
      <div class = "user">
        <h1>Register</h1>
        <form method="post" class ="dt">
    		    <div class = "nm">
              Name*<br>
              <input type="text" name="uname" placeholder= "Enter your name" required />
            </div>
              <div class = "eml">
                Email*<br>
                <input type="text" name="email" placeholder= "Enter your email" required />
              </div>
              <div class = "phn">
                Phone(optional)<br>
                <input type="text" name="phone" placeholder= "Enter your number" />
              </div>
            <div class = "ps">
              Password*<br>
              <input type="password" name="pass" placeholder= "Enter your password" required />
            </div>
            <div class = "rps">
              Re-enter your password*<br>
              <input type="text" name="rpass" placeholder= "Enter your password" required />
            </div>
            <div class = "sbt">
            <button type = "submit" name = "submit" value = "Submit">
              <span class = "sub">Submit</span>
            </button>
          </div>
          <h3 class = "login-link">Already have an account? <a href=login.php>Login</a></h3>
        </form>
      </div>
    </section>
    <?php
      require 'footer.php';
    ?>
  </body>
</html>
<?php
if (isset($_POST['submit']))
{
  $name = mysqli_real_escape_string($con,$_POST['uname']);
  $contactno = mysqli_real_escape_string($con,$_POST['phone']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $pw = mysqli_real_escape_string($con,$_POST['pass']);
  $rpw = mysqli_real_escape_string($con,$_POST['rpass']);
  $t = "Select * from customer where customer_email = '$email'";
  $te = mysqli_query($con,$t);
  if (!$te)
  {
    printf("Error: %s\n", mysqli_error($con));
    exit();
  }
  $e = mysqli_fetch_array($te,MYSQLI_ASSOC);
  if($e !== null && $e['customer_email']==isset($email))
  {
    echo "<script>
            bootbox.alert({
                message: 'This email already exists, make sure the email you typed is correct',
                backdrop: true
            });
    </script>";
  }
  else if(filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    if($pw==$rpw)
    {
      $phash = password_hash($pw, PASSWORD_DEFAULT);
      $sql = "INSERT INTO customer (customer_name,customer_email,customer_pass,customer_contact) VALUES ('$name','$email','$phash','$contactno')";
      $r = mysqli_query($con,$sql);
      header("Location: register_success.php");
    }
    else
    {
      echo "<script>
              bootbox.alert({
                  message: 'Passwords do not match',
                  backdrop: true
              });
      </script>";
    }
  }
  else
  {
    echo "<script>
            bootbox.alert({
                message: 'Invalid Email Format',
                backdrop: true
            });
    </script>";
  }
}
?>
