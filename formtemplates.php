<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="Authors" content="Daniel Clarke" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link id="theme" rel="stylesheet" href="./style/formpages.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <link rel="icon" href="images/logo_transparent.png" type="image/x-icon" />
  <title> </title>
</head>

<body>
  <div id="main">
    <div id="mainTextBox">
      <h1>
        <div class="switch-container">
          <input type="checkbox" name="check" id="switch" style="display: none" />
          <label for="switch" id="switchlbl">
            <i class="fas fa-sun" style="font-size: 18px"></i>
            <i class="fas fa-moon" style="font-size: 18px"></i>
            <span class="ball"></span>
          </label>
        </div>
      </h1>
    </div>
    <script src="scripts/theme.js"></script>
    <form action=" " method="post">
      <div>
        <button type="submit" value="Submit">Submit</button>
        <button type="reset" value="Start over">Reset</button>
      </div>
      <button onclick="window.location.href='index.php'" id="back">
        Go to home page
      </button>
    </form>
  </div>
</body>

</html>