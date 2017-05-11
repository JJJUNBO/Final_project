<?php
	
$type = $_POST["u_type"];
$item_name = $_POST["u_name"];
$price = $_POST["u_price"];
$itemid = $_POST["u_ID"];
if($type!=""&&$item_name!=""&&$price!=""){
	try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if($conn->exec("update items set name='$item_name',type='$type',price=$price where ID=$itemid")){
	  echo "<script>alert('Successful');</script>";	  
     }
	else echo "<script>alert('no record changed');</script>";
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
	
	if ((($_FILES["u_file"]["type"] == "image/gif")
|| ($_FILES["u_file"]["type"] == "image/jpeg")
|| ($_FILES["u_file"]["type"] == "image/jpg")
|| ($_FILES["u_file"]["type"] == "image/png")
|| ($_FILES["u_file"]["type"] == "image/pjpeg"))
&& ($_FILES["u_file"]["size"] < 200000))
  {
  if ($_FILES["u_file"]["error"] > 0)
    {
    echo "<script>alert('create image fail');</script>";
    }
  else
    {
     $result = @unlink("picture/$itemid.jpg"); 
    if (file_exists("picture/" . "$itemid.jpg"))
      {
      echo "<script>alert('create image fail');</script>";
      }
    else
      {
      move_uploaded_file($_FILES["u_file"]["tmp_name"],
      "picture/" . "$itemid.jpg");
      }
    }
	echo "<script>alert('image file changed');</script>";
	header("Refresh:0.5;url=Admin_page.php");
  }
else
  {
  	  echo "<script>alert('Invalid image file');</script>";
	  header("Refresh:0.5;url=Admin_page.php");
      die(0);
  }
?>