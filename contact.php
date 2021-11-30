<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Store Policies | Fashionzilla</title>
    <link rel="stylesheet" href="css/contact.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap1.min.css">
  </head>
  <body>
    <?php
      require 'nav_bar.php';
    ?>
    <section id = "contact">
      <div class = "info">
        <div class= "large">
          Contact Us
        </div>
        <div class="medium">
          3-23 Connaught Place, New Delhi 110001<br><br><br>
          fashionzilla@gmail.com<br><br><br>
          1234567890
        </div>
      </div>
      <div class = "user">
        <form class ="dt">
    		    <div class = "nm">
              Name*<br>
              <input type="text" name="username" placeholder= "Enter your name" required />
            </div>
            <div class = "add">
              Address<br>
              <input type="text" name="address" placeholder= "Enter your address" />
            </div>
            <div class = "to">
              <div class = "eml">
                Email*<br>
                <input type="text" name="email" placeholder= "Enter your email" required />
              </div>
              <div class = "phn">
                Phone<br>
                <input type="text" name="phone" placeholder= "Enter your number" />
              </div>
            </div>
            <div class = "sub">
              Subject*<br>
              <input type="text" name="subject" placeholder= "Type the subject" required />
            </div>
            <div class = "msg">
              Message*<br>
              <input type="text" name="message" placeholder= "Type the message here..." required />
            </div>
            <div class = "sbt">
            <button type = "submit" name = "submit" value = "Submit">
              <span class = "sub">Submit</span>
            </button>
          </div>
        </form>
      </div>
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
      require 'footer.php'
     ?>
  </body>
</html>
