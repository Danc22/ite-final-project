<?php
session_start();
if (!isset($_SESSION['region'])){
  header('Location: ./location.php');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="Authors" content="Daniel Clarke" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link id="theme" rel="stylesheet" href="./style/formpages.css" />
  <link rel="script" href="./scripts/jquery-3.7.1.js">
  <link rel="icon" href="./images/logo.png" type="image/x-icon" />
  <title>Barbados</title>
</head>

<body>
  <div id="main">
    <div id="mainTextBox">
      <h1><span> IslandMovers - <?php echo $_SESSION['region']; ?></span></h1>
      <a href="./rides.php">Rides</a>
      <a href="./pending_rides.php">Pending Rides</a>
      <?php echo (isset($_SESSION['loggedin'])) ?  '<a href="./function/logout.php">Log Out</a>
      <a href="./order.php>Book a Ride </a>"': '<a href="./login.php">Login/Sign Up</a>';  ?>
      <a href="./about.html">About</a>
    </div>

  </div>
</body>

</html>