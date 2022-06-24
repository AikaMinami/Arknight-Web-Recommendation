<HTML>
    <body>
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
    </body>
</html>

