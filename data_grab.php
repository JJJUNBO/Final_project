<?php
$type = $_REQUEST["type"];
if($type=="select")die(0);
try {
    $conn = new PDO('mysql:host=localhost:3307;dbname=final_project','root','root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $rows = $conn->query("SELECT * from items where type='$type'");
	?>
	<table class="table">
           <thead>
            <tr>
            <th>Name</th>
			<th>Type</th>
			<th>Price</th>
			<th>Image</th>
			<th>Operation</th>
            </tr>
            </thead>
			<tbody>
	<?php
    foreach($rows as $row){
		?><tr><?php
		?><td><?php echo $row[1];?></td><?php 
		?><td><?php echo $row[2];?></td><?php
		?><td><?php echo $row[3];?></td><?php
		?><td><img src="picture/<?php echo $row[0];?>.jpg" height="100" width="100"></td><?php
		?><td><button onclick="Additem(<?php echo $row[0]?>)">Add to cart</button></td><?php
		?></tr><?php
		 }
		 ?>  
		 </tr>
            </tbody>
            </table> <?php
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>