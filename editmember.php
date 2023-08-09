
<?php
  include_once"header.php";
    require_once "conn.php";

  require_once "functions.php";

/*
  if($_POST){
      $id = $_POST['id'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $username = $_POST['username1'];
      $address = $_POST['address'];
      $country = $_POST['country'];
      $occupation = $_POST['occupation'];
      $edit_pic = $_FILES["editpic"]['name'];

      $old_image = $_POST['oldimage'];

     if($edit_pic != ''){
      $update_filename =$_FILES["editpic"]['name'];
     }else{

      $update_filename = $old_image;
     }

     if(file_exists("include/pics/" . $_FILES['editpic']['name'])){

      $filename = $_FILES["editpic"]['name'];
      $message = "your file exist ";
     }else{
         $query ="UPDATE bts
				 SET
				 firstname= '$firstname',
				 lastname = '$lastname',
				 email    = '$email',
         username    = '$username',
				 address  = '$address',
				 country  = '$country',
         occupation  = '$occupation',
        pic = ' $update_filename'
				 WHERE 
				 id = '$id' ";
		//$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $query_run = mysqli_query($conn,$query);

      if($query_run){
          if($_FILES['editpic']['name'] != ''){
            move_uploaded_file($_FILES['editpic']['tmp_name'], "include/pics/".$_FILES['editpic']['name']);
            $broad1name2=".include/pics/".$old_image;
            unlink($broad1name2);
          }
       $message = "updated"; 
      }
      else{
        echo "not updated";
      }

  
  }
}
*/
$message   = '';
if($_POST){
  
  $id = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $username = $_POST['username1'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $occupation = $_POST['occupation'];
  $edit_pic = $_FILES["editpic"]['name'];
  
 
 
  if($_FILES['editpic']['name'] != ''){
    $img_path= "pics/";
        $posted='editpic';
        if ($_FILES[$posted]['name']){	
          $uploaded_file=upload($posted, $img_path); 
          if ($uploaded_file){ 
 
 
 
 
 $query ="UPDATE bts
     SET
     firstname= '$firstname',
     lastname = '$lastname',
     email    = '$email',
     username    = '$username',
     address  = '$address',
     country  = '$country',
     occupation  = '$occupation',
    pic = '$uploaded_file'
     WHERE 
     id = '$id' ";
 
    $query_run = mysqli_query($conn,$query);
          }
          else {
           
            $message = " choose right path";
        }
        }
      }else{
        $query ="UPDATE bts
        SET
        firstname= '$firstname',
        lastname = '$lastname',
        email    = '$email',
        username    = '$username',
        address  = '$address',
        country  = '$country',
        occupation  = '$occupation'
        WHERE 
     id = '$id' ";
     $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      }

    }
  /*if($query_run){
    
        move_uploaded_file($_FILES['editpic']['tmp_name'], "pics/".$_FILES['editpic']['name']);
        $message = "updated"; 
      }
  
  
  else{
    echo "not updated";
  }


}
*/





    if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		$query = "SELECT * FROM bts WHERE id = '$id' ";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		$row = mysqli_fetch_assoc($result);
		$firstname = $row['firstname'];
		$lastname  = $row['lastname'];
    $email     = $row['email'];
    $username = $row['username'];
		$address   = $row['address'];
    $country   = $row['country'];
    $occupation = $row['occupation'];
		$pic       = $row['pic'];
		$pic_tag   = '';
		if($pic){
			$pic_tag = "<img src='$pic' class='pic'>";
		}
	
		
	}


?>











<link rel="stylesheet" href="css/style4.css">
  <div class="contact-wrapper">
    
  
  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> 

  <div align="center"> <?= $message ?></div>
        <div class="form-row">
          <input type="text" name="id" id="id " readonly value="<?= $id ?>" />
        <span>ID</span>
        </div>
        
        <div class="form-row">
          
              <input type="text" name="firstname" id="firstname"  value="<?= $firstname ?>"required  />
          <span>FIRSTNAME</span>
          </div>
         
       
        <div class="form-row">
          <input type="text" name="lastname" id="lastname"  value="<?= $lastname ?>" required />
          <span>LASTNAME</span>
        </div>
        <div class="form-row">
          <input type="email" name="email" id="email"  value="<?= $email ?>" required/>
          <span>EMAIL</span>
        </div>
        <div class="form-row">
          <input type="text" name="username1" id="username1"  value="<?= $username ?>"  required/>
          <span>USERNAME</span>
        </div>
        <div class="form-row">
          <input type="text" name="address" id="address"  value="<?= $address ?>" required/>
          <span>ADDRESS</span>
        </div>
        <div class="form-row">
          <input type="text" name="country" id="country"  value="<?= $country ?>" required/>
          <span>COUNTRY</span>
        </div>
        <div class="form-row">
          <input type="text" name="occupation" id="occupation"   value="<?= $occupation ?>" required/>
          <span>OCCUPATION</span>
        </div>
        <div class="form-row">
        <input type="file" name ="editpic" id="editpic"/>
          
        </div>

        <br><br>
      
      <div class="pic"> <?= $pic_tag ?> </div>
	  <br>
        <div class="form-row"> 
          <button type="submit"   id="update" name="update">Update</button>
        </div>
      </form>
     
    </div>
    

    <?php 

include_once "footer.php";

?>  
</html>

