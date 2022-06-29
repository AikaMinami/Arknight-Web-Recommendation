<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<h1 style="text-align:center">Please input the criteria priority (All 4 criteria added must total to 100)</h1>

<br><br><br>
<section class="operatorInput" style="margin-left:50px;">
    <form action="userCalculation.php" method="POST">
        <table>
            <tr>
              <td>Health :</td>
              <td><input type="number" name="Health" required></td>
            </tr>
            <tr>
              <td>DPS :</td>
              <td><input type="number" name="DPS" required></td>
            </tr>
            <tr>
              <td>Cost :</td>
              <td><input type="number" name="Cost" required></td>
            </tr>
            <tr>
              <td>Survivability :</td>
              <td><input type="number" name="Survivability" required></td>
            </tr>
            <tr>
              <td><input type="submit" value="Submit" name="submit"></td>
            </tr>
        </table>
    </form>
</selection>

<div class="main">
    <a class= "button" href="index.php" style="font-weight:bold">Back to Home</a>
</div>