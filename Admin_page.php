<html>
<body>
<head>
  <title>Admin Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>
table, th, td {border: 1px solid black;}
table{margin:10px}
#popup{display:none;POSITION:fixed; left:60%; top:40%; width:30%; height:80%; margin-left:-300px; margin-top:-200px; border:1px solid #888; background-color:#edf; text-align:center}
</style>
</head>
<?php
$Admin = $_COOKIE["admin"];
$password = $_COOKIE["password"];
$flag = false;
try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	$rows = $conn->query("SELECT * from admin_user");
	 foreach($rows as $row){
          if($row[1]==$Admin){			  
			  if($row[2]==$password)$flag=true; 
		  }
		 }
	  	  if(!$flag){?><script>alert("information invaild");window.location.href="admin.php";</script>
	  <?php
	     die(0);
	  
	  }
		  echo   "Administrator: ".$row[1]. "<a href='admin.php'>"." logout</a>";
    $rows = $conn->query("SELECT * from items");
	?>
	<table class="table">
           <thead>
            <tr>
			<th>ID</th>
            <th>Name</th>
			<th>Type</th>
			<th>Price</th>
			<th>Image</th>
			<th>Operation</th>
            </tr>
            </thead>
			<tbody>
	<?php
    foreach($rows as $row){
		?><tr><?php
		?><td><?php echo $row[0];?></td><?php 
		?><td><?php echo $row[1];?></td><?php 
		?><td><?php echo $row[2];?></td><?php
		?><td><?php echo $row[3];?></td><?php
		?><td><img src="picture/<?php echo $row[0];?>.jpg" height="100" width="100"></td><?php
		?><td><a href="deletefromdb.php?itemid=<?php echo $row[0];?>" style="cursor: pointer;">Delete</a>
		<a href ="javascript:update(<?php echo $row[0];?>,'<?php echo $row[1];?>','<?php echo $row[2];?>','<?php echo $row[3];?>');" style="cursor: pointer;">Update</a></td><?php
		?></tr><?php
		 }
		 ?>  
		 </tr>
            </tbody>
            </table> 
			<?php
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
<div id="popup">
<h2 id="u_id">Update form</h2>
  <br>
  <form class="" role="form" action="update.php" method="post"
enctype="multipart/form-data">
     <input type="hidden" class="form-control" id="u_ID" name="u_ID">
    <div class="form-group">
      <label for="u_name">name:</label>
      <input type="u_name" class="form-control" id="u_name" name="u_name" placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="u_type">type:</label>
      <select class="form-control" id="u_type" name="u_type">
        <option>bag</option>
        <option>clothes</option>
        <option>jewelry</option>
      </select>
    </div>	
	<div class="form-group">
      <label for="pwd">price:</label>
      <input type="u_price" class="form-control" id="u_price" name="u_price" placeholder="Enter price">
    </div>
	 <div class="form-group">
        <label for="u_file">Image:</label>
        <input type="file" name="u_file" id="u_file" /> 
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
	
  </form>
    <button class="btn btn-default" onclick="closediv()">Close</button>
</div>

<div>
  <h2>Add new item</h2>
  <br>
  <form class="form-inline" role="form" action="additem.php" method="post"
enctype="multipart/form-data">
   <div class="form-group">
      <label for="type">type:</label>
      <select class="form-control" id="type" name="type">
        <option>bag</option>
        <option>clothes</option>
        <option>jewelry/option>
      </select>
    </div>
    <div class="form-group">
      <label for="item name">item name:</label>
      <input type="item name" class="form-control" id="item name" name="item_name" placeholder="Enter item name">
    </div>
    <div class="form-group">
      <label for="pwd">price:</label>
      <input type="price" class="form-control" id="pwd" name="price" placeholder="Enter price">
    </div>
	    <div class="form-group">
        <label for="file">Image:</label>
        <input type="file" name="file" id="file" /> 
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<script>
	function update(itemid,itemname,itemtype,itemprice){
		document.getElementById("popup").style.display="block";
		document.getElementById("u_id").innerHTML="Update item: #"+itemid;
		document.getElementById("u_ID").value = itemid;
		document.getElementById("u_name").value = itemname;
		document.getElementById("u_type").value = itemtype;
		document.getElementById("u_price").value = itemprice;
	}
	function closediv(){
		document.getElementById("popup").style.display="none";
		
	}
</script>
</body>
</html>