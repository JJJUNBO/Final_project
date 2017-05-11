<?php 
$user_name = $_COOKIE["user_name"];
$total = $_COOKIE["total"];
if($total==0)die(0);
$user_arr =  unserialize($_COOKIE["user_cookie"]);
$user_arr[$user_name] = array();
setcookie("user_cookie",serialize($user_arr),time()+3600,"/");
//$history = array(array(array()));
//setcookie("history",serialize($history),time()+3600,"/");
if(!empty($_COOKIE["history"])){
	$history = unserialize($_COOKIE["history"]);
    if(!empty($history["$user_name"])){
	$history["$user_name"][time()]["time"]= time();
	$history["$user_name"][time()]["total"]= $total;
	setcookie("history",serialize($history),time()+3600,"/");
}
	else{
		$history["$user_name"][time()]["time"]= time();
		$history["$user_name"][time()]["total"] = $total;
		setcookie("history",serialize($history),time()+3600,"/");
	}
		
}
else{
	$history = array(array(array()));
	$history["$user_name"][time()]["time"]= time();
	$history["$user_name"][time()]["total"] = $total;
    setcookie("history",serialize($history),time()+3600,"/");
}

?>