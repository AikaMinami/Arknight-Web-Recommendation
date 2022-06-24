<form method="post" action="insert.php">
	<input type="text" name="fname">
	<input type="text" name="lname">
	<input type="submit" id="insert" value="Submit">
</form>

<!--Display from database-->

<?php
include 'conn.php';

$sql = "SELECT id,fname,lname FROM record";
$results = mysqli_query($conn,$sql) or die("database error:".mysqli_error($conn));
?>

<!--table display-->
<table border="1">
	<thead>
		<tr>
			<th>Name</th>
			<th>Last Name</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = mysqli_fetch_assoc($results)){?>
		<tr id="<?php echo $row['id']?>">
		<td><?php echo $row['fname'];?></td>
		<td><?php echo $row['lname'];?></td>
		</tr>	
		<?php }?>
	</tbody>
</table>