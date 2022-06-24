<HTML>
    
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <body>
        <h1 style="text-align:center">Operator Lists</h1>
<div class = "users table">
        <table>
            <tr>
                <th>Operator Name</th>
                <th>Maximum HP</th>
                <th>Attack Power</th>
                <th>Attack Time</th>
                <th>Defense</th>
                <th>Magic Resistance</th>
                <th>Deployment Cost</th>
            </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "datatest");
        $sql = "SELECT * FROM operator";
        $result = $conn -> query($sql);

        if(!$result){
            die( "Invalid Query: " . $connection->error);
        }
        while($row = $result-> fetch_assoc()){
            echo "<tr><td>" . $row['operatorName'] . "</td><td>" . 
            $row['maximumHP']       . "</td><td>" . 
            $row['attackPower']     . "</td><td>" . 
            $row['attackTime']      . "</td><td>" . 
            $row['defense']         . "</td><td>" . 
            $row['magicResistance'] . "</td><td>" . 
            $row['deploymentCost']  . "</td></tr>";
        }
        $conn -> close();
        ?>
        </table>
    </div>
    
    <div class="main">
        <a class= "button" href="index.php" style="font-weight:bold">Back to Home</a>
    </div>
    </body>
</html>

