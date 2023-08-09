<?php 
   include_once "header.php";

?>

<link rel="stylesheet" href="css/style7.css">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form  class="box" action="login.inc.php" method="post">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                     <input type="text" name="username" placeholder="Username">
                      <input type="password" name="password" placeholder="Password"> 
                     <input type="submit" name="submit" value="Login" >
                   
                </form>

                 
                <?php
    if(isset($_GET["error"])){
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields</p>";
      }
      else if ($_GET["error"] == "wrongLogin1") {
        echo "<p>Incorrect login information</p>";
    } 
    
  }
?>
            </div>
        </div>
    </div>
</div>




<?php 

include_once "footer.php";

?>  
</html>