<?php 

include 'config.php';
error_reporting (E_ALL ^ E_NOTICE);

session_start();
if($_SESSION['admins'] == 1 ){
  header("Location: ../main");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Arknights</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <a href="#" class="logo">
          <span class="nav-item">Admin</span>
        </a>
        <li><a href="../login/logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Logout</span>
        </a></li>
      </ul>
    </nav>

<div>
    <section class="main">
      <div class="main-top">
        <h1>Input Operator Stats</h1>
        <i class="fas fa-user-cog"></i>
      </div>

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
    </section>
</div>

</body>
</html>
