<?php

    include_once "header.php";
?>

<link rel="stylesheet" href="css/home1.css">



<?php 
     if (isset($_SESSION['id'])){ 

        echo "<div id='box1'><p id='memname'>Hello, ". $_SESSION['firstname'] . "</p></div>";
     }
?>

<div class="container-1">

















<!-- -------------------------------------- this is model for insert list data                          -----------------------------------------------------------------------------------------------  -->

<div class="modal fade" id="song" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Song Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="insertsong.php" method="POST">
      <div class="modal-body">
           <div class="form-group">
            <label>Song Name</label>
            <input type="text"  name="sname" id="sname" class="form-control" placeholder="Enter Song Name">
            </div>
          <div class="form-group">
            <label>Video Link </label>
            <input type="text"  name="link" id="link" class="form-control" placeholder="Enter Video Link ">
            </div>
            <div class="form-group">
            <label>Description</label>
            <textarea name="des" id="des"  class="form-control"></textarea>
            </div>
           
          
          
          
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
        <button type="submit" name="savedata" class="btn btn-primary">Save Data</button>
      </div>
      </form>
        
    </div>
  </div>
</div>   









<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------  -->



















<div class="card">
    <div class="card-body">
    <button type="button" class="btn1" data-toggle="modal" data-target="#song">
    ADD SONG</button>
</div>
</div>



















<?php
  require_once "conn.php";
  $id = $_SESSION['id'];
  $content = '';
  $query = "Select id,sname,link,des from songs where btid = $id";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while($row = mysqli_fetch_assoc($result)){
  $id= $row['id'];
  $sname = $row['sname'];
  $link = $row ['link']; 
  $des = $row['des'];
  ?>
 <div id="box2">
 <input type="button" class="btn" id="button1" onclick="location.href='editsong.php?id=<?=$id ?>';" value="EDIT " />
 
<a href="deletesong.php?id=<?= $id ?>"  onClick="return confirm('ARE YOU SURE')" class="btn btn-danger "> DELETE </a> 
  </div>

<div class="flex-box-container-1">
    <h1 id="name"><?php echo $sname; ?></h1>
    
   
    <div id="box">
<p><?php echo $des;  ?> </p>
</div>
    <iframe width='500' height='315' src='<?php echo $link; ?>' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
  
    </div>
    
  

<?php
}
?>

  </div> 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>    





<?php 

include_once "footer.php";

?> 
</html>