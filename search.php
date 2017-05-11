<?php
$target = $_REQUEST["target"];
try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $count=0;
	$rows = $conn->query("SELECT * from items where name='$target'");	
	?>
	<table class="table">
           <thead>
            <tr>
            <th>Name</th>
			<th>Type</th>
			<th>Price</th>
			<th>Operation</th>
            </tr>
            </thead>
			<tbody>
	<?php
    foreach($rows as $row){
		$count++;
		?><tr><?php
		?><td><?php echo $row[1];?></td><?php 
		?><td><?php echo $row[2];?></td><?php
		?><td><?php echo $row[3];?></td><?php
		?><td><button onclick="Additem(<?php echo $row[0]?>)">Add to cart</button></td><?php
		?></tr><?php
		 }
		 ?>  
		 </tr>
            </tbody>
            </table> <?php
	if($count==0)echo "<h4>No record</h4>";		
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>