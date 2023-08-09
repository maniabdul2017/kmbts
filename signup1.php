
<?php
  
    include ('header.php');
?>
<link rel="stylesheet" href="css/style6.css">
<div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div class="card card-signin flex-row my-5">
            <div class="card-img-left d-none d-md-flex">
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">Register</h5>
              <form action="signup.inc.php" method="post"  enctype="multipart/form-data">                
                <div class="form-row">
                      <input type="text" name="firstname" id="firstname"  />
                  <span>FIRSTNAME</span>
                  </div>
                <div class="form-row">
                  <input type="text" name="lastname" id="lastname"  />
                  <span>LASTNAME</span>
                </div>
                <div class="form-row">
                  <input type="email" name="email" id="email" />
                  <span>EMAIL</span>
                </div>
                <div class="form-row">
                    <input type="text" name="address" id="address" />
                    <span>ADDRESS</span>
                  </div>
                  <div class="form-row">
                    <input type="text" name="country" id="country" />
                    <span>COUNTRY</span>
                  </div>
                  <div class="form-row">
                    <input type="text" name="occupation" id="occupation"  />
                    <span>OCCUPATION</span>
                  </div>
                <div class="form-row">
                  <input type="text" name="username" id="username"  />
                  <span>USERNAME</span>
                </div>
                <div class="form-row">
                    <input type="password" name="password" id="password" />
                    <span>PASSWORD</span>
                  </div>
                  <div class="form-row">
                    <input type="password" name="passwordrepeat" id="passwordrepeat"  />
                    <span>PASSWORD REPEAT</span>
                  </div>
                 
                  <div class="form-row">
                  <i class="fas fa-photo-video">
              <input type="file" name ="pic" id="pic"/>
              </i>
                  </div>
                
                <div class="form-row"> 
                   <button class="btn btn-lg  btn-block text-uppercase" name="submit" type="submit">Register</button>
                  </div>
                
                  <?php
    if(isset($_GET["error"])){
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields</p>";
      }
      else if ($_GET["error"] == "invalidusername") {
        echo "<p>Choose a proper name</p>";
    } 
    else if ($_GET["error"] == "invalidemail") { 
      echo "<p>Choose a proper email</p>";
    }
    else if ($_GET["error"] == "passworddontmatch") { 
      echo "<p>Passwords doesn't match!</p>";
    }
    else if ($_GET["error"] == "usernametaken") { 
      echo "<p>Username already taken!</p>";
    }
    else if ($_GET["error"] == "emailtaken") { 
      echo "<p>email already taken!</p>";
    }
    else if ($_GET["error"] == "blank") { 
      echo "<p>please add photo</p>";
    }
    else if ($_GET["error"] == "chooserighttype") { 
      echo "<p>please choose right type of photo</p>";
    }
    else if ($_GET["error"] == "none") { 
      echo "<p>you have signed up</p>";
    }
  }
?>
               
              
              
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
 
<?php 

include_once "footer.php";

?>  
</html>