<?php
$type = $_POST["type"];
$item_name = $_POST["item_name"];
$price = $_POST["price"];
if($type!=""&&$item_name!=""&&$price!=""){
	try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$rows = $conn->query("SELECT * from items");
	foreach($rows as $row){
	 $new_id = $row[0]+1;
	}
	if($conn->exec("insert into items(ID,name,type,price)values($new_id,'$item_name','$type',$price)")){
	  echo "<script>alert('Successful');</script>";	  
     }
	}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
	
}
else{
  echo "<script>alert('All fields are mandatory');</script>";
  header("Refresh:0.5;url=Admin_page.php");
  die(0);
}

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "<script>alert('create image fail');</script>";
    }
  else
    {
    
    if (file_exists("picture/" . "$new_id.jpg"))
      {
      echo "<script>alert('create image fail');</script>";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "picture/" . "$new_id.jpg");
      }
    }
	header("Refresh:0.5;url=Admin_page.php");
  }
else
  {
  	  echo "<script>alert('Invalid image file');</script>";
	  header("Refresh:0.5;url=Admin_page.php");
      die(0);
  }
?>
