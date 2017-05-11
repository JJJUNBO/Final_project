<?php
$itemid = $_REQUEST["itemid"];
try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = true;
if(file_exists("picture/$itemid.jpg"))$result = @unlink("picture/$itemid.jpg"); 
if($result == false){
echo  "delete fail";
}
else{
if($conn->exec("delete from items where ID=$itemid")){
	echo "<script>alert('delete successfully');</script>";	 
	
}
}
header("Refresh:0.5;url=Admin_page.php");
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



?>
	