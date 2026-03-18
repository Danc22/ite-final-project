<?php
session_start();
if (!isset($_SESSION['region'])) {
  header('Location: ./location.php');
  die();
}
if(!isset($_SESSION['loggedin'])){
  header('Location:login.php');
  die();
} 
require_once('./function/order_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="Authors" content="Daniel Clarke" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link id="theme" rel="stylesheet" href="./style/formpages.css" />
  <link rel="icon" href="./images/logo.png" type="image/x-icon" />
  <style>
    .text {
      margin-top: 0.25vw;
    }
  </style>
  <title>Book Ride</title>
</head>

<body>
  <div id="main">
    <div id="mainTextBox">
      <h1><span>Order Now</span></h1>

      <form action="./function/order_submit.php" method="post" style="display: flex; align-self:center">

        <?php displayInputs(); ?>
        <input type="text" name="otime" id="otime" hidden>
        <div style="display: flex;width:100%; flex-direction:column">
          <span style="display: flex; flex-direction:row; align-items:center; width:100%;justify-content: space-between;">
            <button type="reset" onclick="location.reload()">Reset</button>
            <button type="submit" onclick="currentTime()" value="Submit" <?php if (isset($_SESSION['locationIncorrect'])) echo 'disabled' ?>>Order</button>
          </span>
          <button type="button" onclick="history.back()">Return</button>
          <a href='./'>Go to home page</a>
        </div>
      </form>
    </div>
  </div>
  <script>
    <?php if (isset($_SESSION['error'])) {
      echo 'alert("' . $_SESSION['error'] . '")';
      unset($_SESSION['error']);
    } ?>

    function currentTime() {
      date = new Date();
      formatted = date.toLocaleString()
      document.getElementById('otime').setAttribute('value', formatted);
    }
  </script>
</body>

</html>