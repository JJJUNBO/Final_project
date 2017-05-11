<?php
$Admin = $_POST["Admin"];
$password = $_POST["Password"];
$flag = false;
try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	$rows = $conn->query("SELECT * from admin_user");
	 foreach($rows as $row){
          if($row[1]==$Admin){			  
			  if($row[2]==$password){
			  $flag=true;
			  setcookie("admin",$Admin,time()+3600,"/");
              setcookie("password",$password,time()+3600,"/");
			  
			  } 
		  }
		 }
	  	  if(!$flag){
			  ?><script>alert("information invaild");window.location.href="admin.php";</script>
	  <?php
	     header("Refresh:0.5;url=admin.php");
	     die(0);
	  
	  }
		  else header("Refresh:0.5;url=Admin_page.php");
		  
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }