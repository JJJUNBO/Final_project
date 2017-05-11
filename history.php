<?php 
$user_name = $_COOKIE["user_name"];
$total = $_COOKIE["total"];
if(!empty($_COOKIE["history"])){
$history = unserialize($_COOKIE["history"]);
$name = $history[$user_name];
?> <table class="table">
           <thead>
            <tr>
            <th>Date</th>
			<th>Total</th>
            </tr>
            </thead>
            <tbody><?php
foreach($name as $time){
if(!empty($time["time"])){
?><tr><?php
$my_t = getdate($time["time"]);
?><td><?php echo("$my_t[month] $my_t[mday], $my_t[year]");?></td><?php
?><td><?php echo $time["total"];?></td><?php

}
}
?><button onclick="Additem(0);">Back to cart</button><?php
	
}

?>