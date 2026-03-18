<?php
session_start();
if (!isset($_SESSION['region'])){
  header('Location: ./location.php');
  die();
}
require_once('./function/pending.php');
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


  </style>
  <title>Book Ride</title>
</head>

<body>
  <div id="main">
    <div id="mainTextBox">
      <h1><span>Order Now</span></h1>

        <?php 
        if(!isset($_SESSION['loggedin'])){
            echo 'please login to view pending rides
            <a href="./login.php">login</a>';
        } else{
            viewPending();
        }
        ?>

        <div style="display: flex;width:100%; flex-direction:column">
          <a href='./'>Go to home page</a>
        </div>

    </div>
  </div>
  <script>
        <?php if(isset($_SESSION['error'])){
      echo 'alert("'.$_SESSION['error'].'")';
      unset($_SESSION['error']);
    }?>
  </script>
</body>

</html>