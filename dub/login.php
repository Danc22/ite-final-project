<?php
session_start();
if ((!isset($_SESSION['country']) || isset($_SESSION['incorrectLocation']))){
  header('Location: ./location.php');
  die();
} elseif (isset($_SESSION['loggedin'])) {
  header('Location: ./');
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
  <link id="theme" rel="stylesheet" href="../style/formpages.css" />
  <link rel="icon" href="../images/logo.png" type="image/x-icon" />
  <style>
    a{
      min-height: 0;
      height: 40px;
      margin-top: 0;
    }
  </style>
  <title>Login</title>
</head>

<body>
  <div id="main">
    <div id="mainTextBox">
      <h1><span>Login</span></h1>
      <form action="./function/login_funct.php" method="post">
        <div class="text">

          <label for="username">Email</label>
          <input type="email" id="email" name="email" autocomplete="off" <?php
                                                                              if (isset($_SESSION['username'])) {
                                                                                echo 'value="' . $_SESSION['username'] . '"';
                                                                              } else {
                                                                                echo "autofocus";
                                                                              }
                                                                              ?> required />
          <span></span>
        </div>
        <div class="text">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" pattern='{6,}' required <?php
                                                                                        if (isset($_SESSION['username'])) {
                                                                                          echo 'autofocus';
                                                                                          session_unset();
                                                                                        }
                                                                                        ?> />
          <span></span>
        </div>
        <div style="display: flex;width:100%; flex-direction:column">
          <span style="display: flex; flex-direction:row; align-items:center; width:100%;justify-content: space-between;">
            <a href='./signup_page.php ' type="reset" style="border: 0;
    border-radius: 15px;
    transition: all 0.2s linear;">Sign Up</a>
            <button type="submit" value="Submit">Login</button>
          </span>
          <a href='./'>Go to home page</a>
        </div>
      </form>
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