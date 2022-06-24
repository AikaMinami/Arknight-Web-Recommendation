<?php

include 'config.php';
$opName = $_POST['operatorid'];
$newReport = "INSERT INTO selected(operatorName, maximumHP, attackPower, attackTime, defense, magicResistance, deploymentCost) 
SELECT operatorName, maximumHP, attackPower, attackTime, defense, magicResistance, deploymentCost FROM operator WHERE operatorName = '" . $opName . "'";

if (mysqli_query($conn,$newReport))

	{
		echo "<script>alert('Success')
				location.href = 'selection.php?attempt=success';
				</script>";
	}
	else
	{
		echo "Error adding user in database<br />";
	}
?>	

