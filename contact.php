<?php 

  include_once"header.php";

?>
<?php


  $message_sent = false;
  if(isset($_POST['email']) && $_POST['email'] !=''){

    if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $to = "komzziiee@gmail.com";
  $body = "";

  $body .="From: ".$name. "\r\n";
  $body .="From: ".$email. "\r\n";
  $body .="From: ".$message. "\r\n";
      //mail($to,$subject,$message);
      $message_sent =true;

    }
  
  
  }
  
?>



<link rel="stylesheet" href="css/contact.css">
<?php
  if($message_sent) :
  
?>


  <h3>Thanks, w'll be in touch</h3>
<?php
else:
?>
    <div class="container">
     
      <div class="form">
        <div class="contact-info">
          

          <div class="social-media">
           
            <div class="social-icons">
             
              <a href="https://twitter.com/bts_twt?lang=en">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://www.instagram.com/bts.bighitofficial/?hl=en">
                <i class="fab fa-instagram"></i>
              </a>
              
            </div>
          </div>
        </div>

        <div class="contact-form">

          <form action="contact.php" method="post">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" id="name" class="input" required/>
              <label for="name">Full Name</label>
              <span>Full Name</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" id="email" class="input" required />
              <label for="email">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="text" name="subject" id="subject" class="input" required/>
              <label for="subject">Subject</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" id="message" class="input"></textarea>
              <label for="message">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send" class="btn" />
          </form>
        </div>
      </div>
    </div>
<?php
endif;
?>
    <script src="js/app.js"></script>
 
<?php 

include_once "footer.php";

?>  
</html>
