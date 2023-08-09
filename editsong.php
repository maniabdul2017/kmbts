<?php

    include_once "header.php";
    require_once "conn.php";


    $message = '';
    if($_POST){
        $id = $_POST['id'];
        $sname =  $_POST['sname'];
        $link =  $_POST['link'];
        $des =  $_POST['des'];
        

        $query ="UPDATE songs
        SET
        sname= '$sname',
        link = '$link',
        des    = '$des'
        WHERE 
        id = '$id'";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		$message  =  "RECORD UPDATED";




    }













    
   if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		$query = "SELECT * FROM songs WHERE id = '$id' ";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		$row = mysqli_fetch_assoc($result);
        $sname = $row['sname'];
        $link = $row ['link'];
        $des = $row['des'];
		}
	
		
	


?>

<link rel="stylesheet" href="css/editsong.css">
<div class="contact-wrapper">
    
  
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" > 
  
    <div align="center"> <?= $message ?></div>
          <div class="form-row">
            <input type="text" name="id" id="id " readonly value="<?= $id ?>" />
          <span>ID</span>
          </div>
          
          <div class="form-row">
            
                <input type="text" name="sname" id="sname"  value="<?= $sname ?>"required  />
            <span>SONG NAME</span>
            </div>
           
          <div class="form-row">
            <input type="text" name="link" id="link"  value="<?= $link ?>" required/>
            <span>LINK</span>
          </div>
          <div class="form-row">
          <textarea name="des" id="des" cols="60" rows="6" ><?= $des ?></textarea>
           
          </div>
          <div class="form-row"> 
            <button type="submit"   id="update" name="update">Update</button>
          </div>
        </form>
       
      </div>
    </div>






















     
<?php 

include_once "footer.php";

?>  
</html>
