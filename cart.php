<?php 
$itemid = $_REQUEST["itemid"];
$user_arr =  unserialize($_COOKIE["user_cookie"]);
$user_name = $_COOKIE["user_name"];
$total = 0;
if($itemid!=0){
if(empty($user_arr[$user_name][$itemid])){
	$user_arr[$user_name][$itemid] = 1;
	setcookie("user_cookie",serialize($user_arr),time()+3600,"/");
}
else {
     $user_arr[$user_name][$itemid]++;
	 setcookie("user_cookie",serialize($user_arr),time()+3600,"/");	 
}
}
try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $rows = $conn->query("SELECT count(*) from items");
	 foreach($rows as $row){
		 $count = $row[0];
	 }
	?> <table class="table">
           <thead>
            <tr>
            <th>Name</th>
			<th>Type</th>
			<th>Price</th>
			<th>Num</th>
			<th>Operation</th>
            </tr>
            </thead>
            <tbody><?php

for ($x = 0; $x <= 20; $x++) {
    if(!empty($user_arr[$user_name][$x])&&$user_arr[$user_name][$x]!=0){
		$rows = $conn->query("SELECT * from items where ID=$x");		 
		foreach($rows as $row){
		?><tr><?php
		?><td><?php echo $row[1];?></td><?php 
		?><td><?php echo $row[2];?></td><?php 
		?><td><?php echo $row[3];?></td><?php 
		?><td><?php echo $user_arr[$user_name][$x];?></td><?php 
	    ?><td><button onclick="deleteitem(<?php echo $x; ?>);">delete</button></td></tr><?php  $total=$total+$row[3]*$user_arr[$user_name][$x];
	}		 
	 }
} 
setcookie("total",$total,time()+3600,"/");

		 ?>  
		 
            </tbody>
            </table> 
			<div id = "checkout">
			<h4>Total: $<?php echo $total;?></h4>
<button onclick="checkout()">Checkout</button>
<button onclick="history()">History</button>
			</div>
			<?php
	 }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
