<?php
	
	require_once "conn.php";
	
	
    if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
	   
		
		   $query = "DELETE FROM songs WHERE id='$id'";
		 $query_run = mysqli_query($conn, $query);
		 if($query_run)
		{
			echo '<script> alert ("Data Deleted");</script>';
			header('Location:index1.php');
			
			
		} else {
			  echo '<script> alert ("Data Not Deleted");</script>';
		}
		 
	}