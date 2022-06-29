
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<br>
<h1 style="text-align:center">Input Operator Data</h1>
<br><br>
<section class="operatorInput" style="margin-left:50px;">
        <form action="input.php" method="POST">
            <table>
             <tr>
              <td>Operator Name :</td>
              <td><input type="text" name="operatorName" required></td>
             </tr>
             <tr>
              <td>Maximum HP :</td>
              <td><input type="number" name="maximumHP" required></td>
             </tr>
             <tr>
              <td>Attack Power :</td>
                <td>
                    <input type="number" name="attackPower" required>
                </td>
             </tr>
             <tr>
              <td>Attack Time :</td>
              <td><input type="number" step="0.1" name="attackTime" required></td>
             </tr> 
             <tr>
              <td>Defense :</td>
              <td>
                <input type="number" name="defense" required>
              </td>
             </tr>
             <tr>
                <td>Magic Resistance :</td>
                <td><input type="number" name="magicResistance" required></td>
               </tr>
            <tr>
                <td>Deployment Cost :</td>
                <td><input type="number" name="deploymentCost" required></td>
            </tr>
            <tr>
              <td><input type="submit" value="Submit" name="submit"></td>
            </tr>
            </table>
        </form>
      </section>

<div class = "users table">
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
        include '../login/config.php';
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
</div>

<div class="main">
<a class= "button" href="userWeight.php">Proceed to calculation</a>
</div>

<div class="main">
    <a class= "button" href="index.php" style="font-weight:bold">Back to Home</a>
</div>
