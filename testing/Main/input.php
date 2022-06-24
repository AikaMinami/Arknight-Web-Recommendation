<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['operatorName']) && isset($_POST['maximumHP']) &&
        isset($_POST['attackPower']) && isset($_POST['attackTime']) &&
        isset($_POST['defense']) && isset($_POST['magicResistance'])&&
        isset($_POST['deploymentCost'])) {
        
        $operatorName = $_POST['operatorName'];
        $maximumHP = $_POST['maximumHP'];
        $attackPower = $_POST['attackPower'];
        $attackTime = $_POST['attackTime'];
        $defense = $_POST['defense'];
        $magicResistance = $_POST['magicResistance'];
        $deploymentCost = $_POST['deploymentCost'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "datatest";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Insert = "INSERT INTO selected(operatorName, maximumHP, attackPower, attackTime, defense, magicResistance, deploymentCost) values(?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Insert);
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("siidiii",$operatorName, $maximumHP, $attackPower, $attackTime, $defense, $magicResistance, $deploymentCost);
                if ($stmt->execute()) {
                    header('Location: '.$_SERVER['HTTP_REFERER']);
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Failed Input";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>