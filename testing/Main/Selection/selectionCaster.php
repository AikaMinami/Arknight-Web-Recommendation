<?php
include '../../login/config.php';
session_start();

$conn = mysqli_connect("localhost", "root", "", "datatest");
$sql = "SELECT * FROM operator WHERE classes = '6'";
$operator = mysqli_query($conn, $sql);
$options = "";
    while($operators = mysqli_fetch_array($operator))
    {
        $options = $options."<option value = $operators[1] name=operatorid>$operators[1]</option>";
    }        
?>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<form action="selectedop.php" method="POST">
    <select id= "operatorid" name= "operatorid">
        <option> --Select an Operator-- </option>
        <option>    
            <?php
                echo $options
            ?>
        </option>
    </select>
    <input type="submit" id="insert" value="Submit"></td>
</form>
<table border="1">
	<thead>
		<tr>
            <th>Operator Name</th>
            <th>Maximum HP</th>
            <th>Attack Power</th>
            <th>Attack Time</th>
            <th>Defense</th>
            <th>Magic Resistance</th>
            <th>Deployment Cost</th>
		</tr>
	</thead>
	<tbody>
		<?php 
        $sql2 = "SELECT * FROM selected";
        $result = $conn -> query($sql2);

        while($row = $result-> fetch_assoc()){?>
		<tr id="<?php echo $row['id']?>">
		<td><?php echo $row['operatorName'];?></td>
		<td><?php echo $row['maximumHP'];?></td>
        <td><?php echo $row['attackPower'];?></td>
        <td><?php echo $row['attackTime'];?></td>
        <td><?php echo $row['defense'];?></td>
        <td><?php echo $row['magicResistance'];?></td>
        <td><?php echo $row['deploymentCost'];?></td>
		</tr>	
		<?php }?>
	</tbody>
</table>
<br>
<a class= "button" href="../calculation/calculationCaster.php">Proceed to calculation</a>