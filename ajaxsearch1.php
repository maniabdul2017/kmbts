<!DOCTYPE html>

<html>
<head>

<style>
  .deletebtn{
    background: url('img/delete.png');
    width:32px;
    height:36px;
  }
</style>
</head>
    <body>
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete SENT DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="deletecode.php" method="POST">
      <div class="modal-body">
          <input type="hidden" name="delete_id"  id="delete_id">
          
          <h4>Do you want to Delete this Data</h4>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          
        <button type="submit" name="deletedata" class="btn btn-primary">YES !!Delete it</button>
      </div>
      </form>
        
    </div>
  </div>
</div>   
</div>



<?php
 require_once "conn.php";

$search_value =$_POST["search"];




$sql = "select * from bts where email like '%{$search_value}%' or lastname like '%{$search_value}%' ";
$result = mysqli_query($conn, $sql) or die("sql query failed");
$output="";
if(mysqli_num_rows($result)>0){
    
    $output = '<table id="tablesent" class="container">
<thead>
		<tr>
			<th><h1>ID</h1></th>
			<th><h1>FIRSTNAME</h1></th>
			<th><h1>LASTNAME</h1></th>
			<th><h1>EMAIL</h1></th>
      <th><h1>USERNAME</h1></th>
      <th><h1>ADDRESS</h1></th>
			<th><h1>COUNTRY</h1></th>
			<th><h1>OCCUPATION</h1></th>
			<th><h1>PIC</h1></th>
            <th><h1>SERVICES</h1></th>
		</tr>

  </thead>';
 
    
            while($row= mysqli_fetch_assoc($result)){
               	$id        = $row['id'];
                $pic       = $row['pic'];
              $pic_tag   = '';
              if($pic){
                $pic_tag = "<img src='$pic' class='pic'>";
              }
              $output .= "<tr><td>{$row['id']}</td><td>{$row['firstname']}</td> <td>{$row['lastname']}</td> <td>{$row['email']}</td><td>{$row['username']}</td><td>{$row['address']}</td><td>{$row['country']}</td><td>{$row['occupation']}</td><td id='pics'> $pic_tag </td>
              <td>
              <a href='editmember.php?id=$id'>   <img src='img/edit.png' width='32'>   </a> 
              <input type='button'  class='deletebtn'/>
                </td>
          



              </tr>";
               
            }
            $output.="</table>";
            mysqli_close($conn);
            echo $output;
            
    
}else{
    
    echo "<h2> no record found</h2>";
}
?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>    


<script>
$(document).ready(function (){
   $('.deletebtn').on('click',function(){
       $('#deletemodal').modal('show');
       
     $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
          return $(this).text();
     }).get();
          
       console.log(data);
       $('#delete_id').val(data[0]);
      
   }); 
});

</script> 

</body>
</html>