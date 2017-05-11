<?php
$username = $_POST["Username"];
$password = $_POST["Password"];
setcookie("user_name",$username,time()+3600,"/");
$flag = false;
 try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $rows = $conn->query("SELECT * from User_table");
	 foreach($rows as $row){
          if($row[1]==$username){
			  if($row[2]==$password)$flag=true; 
		  }
		 }
	  if(!$flag){?><script>alert("information invaild");window.location.href="login.html";</script>
	  <?php
	     die(0);
	  
	  }

	  if(!empty($_COOKIE["user_cookie"])){
        $user_arr =  unserialize($_COOKIE["user_cookie"]);		 
        if(!empty($user_arr["$username"])){
			
		}
		else {
			$user_arr["$username"]["name"] = $username;
			setcookie("user_cookie",serialize($user_arr),time()+3600,"/");
		}
	  }
	  else {
		  $user_arr =  array(array());
		  $user_arr["$username"]["name"]= $username;
		  setcookie("user_cookie",serialize($user_arr),time()+3600,"/");
        //  echo "cookie created";
		  }

	  
		  
	 }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
<html>
<body>
<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>

#user{background:grey;width:120px;height:30px;float:right;padding:5px;color:white}
#top{background:orange}
div{margin-top:20px}
#show{background:green;height:600px;overflow:auto;}
#select{background:red;height:600px}
#cart{background:blue;height:600px;overflow:auto;}
#checkout{float:right}
table, th, td {border: 1px solid black;}
table{margin:10px}
</style>
</head>
<div class="col-md-12" id="top">
<a href="login.html" id="user"><span class="glyphicon glyphicon-user"></span><?php echo $username ?>  Logout</a>
</div>
<div class="col-md-4" id="select">
<h4>Please select a type</h4>
<div id="click">
<select id="dropdown" onchange="list(this.value)">
<option value ="select">select</option>  
<option value ="bag">bag</option>  
<option value ="clothes">clothes</option>  
<option value ="jewelry">jewelry</option>  
</select>
<div>
<h4> Or search by name</h4>
<input type="text" id="search">
<button onclick="search()">search</button>
</div>
</div>
</div>
<div id="show" class="col-md-4 ">

</div>
<div id="cart" class="col-md-4">

</div>
<script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {		
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "cart.php?itemid=0", true);
        xmlhttp.send();

function list(type){	
	    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {		
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("show").innerHTML = xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET", "data_grab.php?type="+type, true);
        xmlhttp.send();

}
function Additem(itemid){
	    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {		
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "cart.php?itemid="+itemid, true);
        xmlhttp.send();
	
}
function checkout(){
	var username = "<?php echo $username?>";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {		
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              Additem(0);
            }
        };
        xmlhttp.open("GET", "deletecookie.php?username="+username, true);
        xmlhttp.send();
    
}

function search(){
		var xmlhttp = new XMLHttpRequest();
		var target = document.getElementById("search").value;
		
        xmlhttp.onreadystatechange = function() {		
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("show").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "search.php?target="+target, true);
        xmlhttp.send();	
				
				
}

function history(){
	    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {		
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "history.php", true);
        xmlhttp.send();	
}

function deleteitem(id){
		
	    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {		
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "deleteitem.php?itemid="+id, true);
        xmlhttp.send();
	
	
}


</script>
</body>
</html>
