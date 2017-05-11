<?php
 $username = $_REQUEST["username"];
 $password = $_REQUEST["password"];
 $email = $_REQUEST["email"];
 $return = "";
 try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $rows = $conn->query("SELECT * from User_table");
	 foreach($rows as $row){
		 if($email==$row[3]){
			 $return = "this email address is already used by another user";
			 echo $return;
			 die(0);
		 }
		 if($username==$row[1]){
			 $return = "this username is already used by another user";
			echo $return;
			 die(0);
		 }
	 }
	 $rows = $conn->query("SELECT count(*) from User_table");
	 foreach($rows as $row){
		 $new_id = $row[0]+1;
	 }
	if($conn->exec("insert into User_table(ID,username,password,email)values($new_id,'$username','$password','$email')")){
		echo "Sign up new account successfully,please back to login page";
		
	}
	}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	

?>

