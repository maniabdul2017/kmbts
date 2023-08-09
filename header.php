<?php

    session_start();
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c880dfa1f9.js" crossorigin="anonymous"></script>   
<link rel="stylesheet" href="css/style.css">
    <title>BTS:The World's Biggest Boy-Band</title>
</head>


<body>
	  <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <a class="navbar-brand" href="#"><img src="img/LOG4.png"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 
      'class="nav-item active"' ?>>
          <a class="nav-link" href="index.php">About</a>
      </li>
      <li <?php if (basename($_SERVER['PHP_SELF']) == 'members.php') echo 
      'class="nav-item active"' ?>>
            <a class="nav-link" href="members.php">Members</a>
      </li>
      <li <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 
      'class="nav-item active"' ?>>
            <a class="nav-link" href="contact.php">Contact</a>
      </li>
     
    
      <?php
        if (isset($_SESSION['id'])){ ?>
          <li <?php if (basename($_SERVER['PHP_SELF']) == 'index1.php') echo 
      'class="nav-item active"' ?> id="test1">
          <a class="nav-link" href="index1.php">Your Data</a>
      </li>
      <li <?php if (basename($_SERVER['PHP_SELF']) == 'membersadmin.php') echo 
      'class="nav-item active"' ?> >
            <a class="nav-link" href="membersadmin.php">Edit Members</a>
      </li>
      <li <?php if (basename($_SERVER['PHP_SELF']) == 'logout.inc.php') echo 
      'class="nav-item active"' ?>>
            <a class="nav-link" href="logout.inc.php" >logout</a>
      </li>
          <?php 
       }else{ ?>
           <li <?php if (basename($_SERVER['PHP_SELF']) == 'Login1.php') echo 
      'class="nav-item active"' ?> id="test">
          <a class="nav-link" href="Login1.php">Login</a>
      </li>
      <li <?php if (basename($_SERVER['PHP_SELF']) == 'signup1.php') echo 
      'class="nav-item active"' ?> >
          <a class="nav-link" href="signup1.php">Signup</a>
      </li>
      <?php  }
      ?>
      </ul>
    
      
  </div>
</nav>