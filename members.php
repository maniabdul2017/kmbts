
<?php
  include_once"header.php";
    require_once "conn.php";

    $query = "Select * from bts";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));



?>

<link rel="stylesheet" href="css/style1.css">
  <div class="container h-100" id="search1">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="search_input" type="text" name="search" id="search" placeholder="Search Lastname OR E-mail">
          <a  class="search_icon"><i class="fas fa-search"></i></a>
        </div>
      </div>
    </div>


<table id="tablesent" class="container">
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
		</tr>

  </thead>
  <tbody>
  <?php

	$counter=0;
	while($row = mysqli_fetch_assoc($result)){
		$counter++;
		$id        = $row['id'];
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
	

?>

    <tr>
    
      <td><?php print $counter; ?></td>

      <td><?= $firstname; ?></td>
      <td><?= $lastname; ?></td>
      <td><?= $email; ?></td>
      <td><?= $username; ?></td>
      <td><?= $address; ?></td>
      <td><?= $country; ?></td>
      <td><?= $occupation; ?></td>
      <td id="pics"><?= $pic_tag; ?></td>
    </tr>
    <?php		
	}
?>

    
</tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


<script>
 $("#search").on("keyup",function(){
     var search_term=$(this).val();
    
    
    $.ajax({
       url: "ajaxsearch.php",
       type:"POST",
       data : {search:search_term},
       success: function(data){
           $("#tablesent").html(data);
           
       }
    });
 });   
    
    
</script>

<?php 

include_once "footer.php";

?>  
</html>