<!DOCTYPE html>

<html>
<head>

</head>
    <body>




<?php
	
	require_once "conn.php";
	
	
	if((isset($_POST['deletedata'])))
	{   $id =$_POST['delete_id'];
	   
		
		   $query = "DELETE FROM bts WHERE id='$id'";
		 $query_run = mysqli_query($conn, $query);
		 if($query_run)
		 {?>
			<script>
			alert("Your Data Deleted Successfully");
			window.location.href='index1.php';
			</script>
		  <?php 
			session_start();
			session_unset();
			session_destroy();
			
			header("location:index.php");
			
			exit();
			
		} else {
			  echo '<script> alert ("Data Not Deleted");</script>';
		}
		 
	}
	?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>   
</body>
</html> 
