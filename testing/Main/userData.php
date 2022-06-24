<section class="operatorInput">
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