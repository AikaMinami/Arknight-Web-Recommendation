<?php
include '../../login/config.php';
session_start();


$sql = "SELECT * FROM selected";
$result = $conn -> query($sql);
#$health =0 ; $dps = 0; $cost = 0; $survivability = 0;
$health_D = 0;
$dps_D = 0;
$cost_D = 0;
$survivability_D = 0;

while($row = $result-> fetch_assoc()){
    #Assigning criteria value
    $name = $row['operatorName'];
    $health = $row['maximumHP'];
    $dps = $row['attackPower'] / $row['attackTime'];
    $cost = $row['deploymentCost'];
    $survivability = $row['defense'] + ($row['magicResistance'] * 100);
    #echo $name, $health, $dps, $cost, $survivability . "     ";
    
    #Denominator
    $health_D += $health * $health;
    $dps_D += $dps * $dps;
    $cost_D += $cost * $cost;
    $survivability_D += $survivability * $survivability;

    $sql2 = "INSERT INTO criteria(operatorName, health, dps, cost, survivability)
    VALUES ('$name', '$health', '$dps', '$cost', '$survivability')";
    mysqli_query($conn, $sql2);
}

$health_W = 25;
$dps_W = 25;
$cost_W = 25;
$survivability_W = 25;

#Normalized + Weighted Value
$sql3 = "SELECT * FROM criteria";
$result2 = $conn -> query($sql3);
while($row2 = $result2-> fetch_assoc()){
    $name = $row2['operatorName'];
    $health_N =round(($row2['health'] / $health_D * $health_W),5);
    $dps_N = round(($row2['dps'] / $dps_D * $dps_W),5);
    $cost_N = round(($row2['cost'] / $cost_D * $cost_W),5);
    $survivability_N = round(($row2['survivability'] / $survivability_D * $survivability_W),5);
$sql4 = "INSERT INTO normalized(operatorName, health, dps, cost, survivability)
VALUES ('$name', '$health_N', '$dps_N', '$cost_N', '$survivability_N')";
mysqli_query($conn, $sql4);
}

#Negative/Positive Ideal Solution
$health_NIS = 100;
$dps_NIS = 100;
$cost_NIS = 0;
$survivability_NIS = 100;

$health_PIS = 0;
$dps_PIS = 0;
$cost_PIS = 100;
$survivability_PIS = 0;

$sql5 = "SELECT * FROM normalized";
$result3 = $conn -> query($sql5);
while($row3 = $result3->fetch_assoc()){
    if($health_NIS > $row3['health']){
        round(($health_NIS = $row3['health']),2);
    }
    if($health_PIS < $row3['health']){
        round(($health_PIS = $row3['health']),2);
    }
    if($dps_NIS > $row3['dps']){
        round(($dps_NIS = $row3['dps']),2);
    }
    if($dps_PIS < $row3['dps']){
        round(($dps_PIS = $row3['dps']),2);
    }
    if($cost_NIS < $row3['cost']){
        round(($cost_NIS = $row3['cost']),2);
    }
    if($cost_PIS > $row3['cost']){
        round(($cost_PIS = $row3['cost']),2);
    }
    if($survivability_NIS > $row3['survivability']){
        round(($survivability_NIS = $row3['survivability']),2);
    }
    if($survivability_PIS < $row3['survivability']){
        round(($survivability_PIS = $row3['survivability']),2);
    }
}

#Alternative Distance with PIS
$op_AD_PIS = array();
$op_AD_PIS_V = 0;

$sql6 = "SELECT * FROM normalized";
$result4 = $conn -> query($sql6);

while($row4 = $result4->fetch_assoc()){
    $op_AD_PIS_V = round((sqrt(pow(($health_PIS - $row4['health']), 2) +
    pow(($dps_PIS - $row4['dps']), 2) +
    pow(($cost_PIS - $row4['cost']), 2) +
    pow(($survivability_PIS - $row4['survivability']),2))),8);

    array_push($op_AD_PIS, $op_AD_PIS_V);
}

#Alternative Distance with NIS
$op_AD_NIS = array();
$sql7 = "SELECT * FROM normalized";
$result5 = $conn -> query($sql7);

while($row5 = $result5->fetch_assoc()){
    $op_AD_NIS_V = round((sqrt(
    pow(($health_NIS - $row5['health']), 2) +
    pow(($dps_NIS - $row5['dps']), 2) +
    pow(($cost_NIS - $row5['cost']), 2) +
    pow(($survivability_NIS - $row5['survivability']), 2))),8);
    array_push($op_AD_NIS, $op_AD_NIS_V);
}

$sql8 = "SELECT * FROM normalized";
$result6 = $conn -> query($sql8);
$count = 0;

while($row6 = $result6->fetch_assoc()){
    $op_FS_V = $op_AD_NIS[$count] / ($op_AD_NIS[$count] + $op_AD_PIS[$count]);
    $name = $row6['operatorName'];
    $count++;
    $sql9 = "INSERT INTO final(operatorName, score) VALUES ('$name', '$op_FS_V')";
    mysqli_query($conn, $sql9);
}
?>

<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<table border="1">
	<thead>
		<tr>
            <th>Operator Name</th>
            <th>Score</th>
		</tr>
	</thead>
	<tbody>
		<?php 
        $sql10 = "SELECT * FROM final ORDER BY score DESC";
        $result7 = $conn -> query($sql10);

        while($row7 = $result7-> fetch_assoc()){?>
		<td><?php echo $row7['operatorName'];?></td>
        <td><?php echo $row7['score'];?></td>
		</tr>	
		<?php }?>
	</tbody>
</table>

<?php
    $sql11 = "DELETE FROM selected";
    $sql12 = "DELETE FROM criteria";
    $sql13 = "DELETE FROM normalized";
    $sql14 = "DELETE FROM final";
    mysqli_query($conn, $sql11);
    mysqli_query($conn, $sql12);
    mysqli_query($conn, $sql13);
    mysqli_query($conn, $sql14);
?>