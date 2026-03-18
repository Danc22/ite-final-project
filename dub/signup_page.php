<?php
session_start();
if(!isset($_SESSION['country'])){
  header('Location: ./location.php');
  die();
}
if(isset($_SESSION['loggedin'])){
  header('Location:./');
}
require_once('./function/signup_page_funct.php');
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
  <title>Sign Up</title>
</head>

<body>
  <div id="main">
    <div id="mainTextBox">
      <h1><span>Sign Up</span></h1>

      <form action="./function/signup.php"method="post" style="display: flex; align-self:center">

        <?php displayInputs(); ?>

        <div style="display: flex;width:100%; flex-direction:column">
          <span style="display: flex; flex-direction:row; align-items:center; width:100%;justify-content: space-between;">
            <button type="reset" onclick="location.reload()">Reset</button>
            <button type="submit" value="Submit" <?php if(isset($_SESSION['locationIncorrect'])) echo 'disabled'?>>Sign Up</button>
          </span>
          <button type="button" onclick="history.back()" >Return</button>
          <a href='./'>Go to home page</a>
        </div>
      </form>
    </div>
  </div>
  <script>
    const password1 = document.querySelector('#pword1');
    const password2 = document.querySelector('#pword2');

    function active() {
      if (password1.value.length < 6) {
        password2.setAttribute("disabled", "")
      } else {
        password2.removeAttribute('disabled', "")
      }
    }
    <?php if(isset($_SESSION['error'])){
      echo 'alert("'.$_SESSION['error'].'")';
      unset($_SESSION['error']);
    }?>
  </script>
</body>

</html>