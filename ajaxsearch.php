
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
      
		</tr>

  </thead>';
 
    
            while($row= mysqli_fetch_assoc($result)){
              $pic       = $row['pic'];
              $pic_tag   = '';
              if($pic){
                $pic_tag = "<img src='$pic' class='pic'>";
              }
              $output .= "<tr><td>{$row['id']}</td><td>{$row['firstname']}</td> <td>{$row['lastname']}</td> <td>{$row['email']}</td><td>{$row['username']}</td><td>{$row['address']}</td><td>{$row['country']}</td><td>{$row['occupation']}</td><td id='pics'> $pic_tag </td>
              
              </tr>";
               
            }
            $output.="</table>";
            mysqli_close($conn);
            echo $output;
            
    
}else{
    
    echo "<h2> no record found</h2>";
}
?>