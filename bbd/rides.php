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
  <link rel="icon" href="./images/logo.png" type="image/x-icon" />
  <style>
    [type='button'] {
      margin-top: 0;
      margin-bottom: 15px;
    }
  </style>
  <title>Barbados - Rides</title>
</head>

<body>
  <div id="main">
    <div id="mainTextBox">
      <h1><span>Rides</span></h1>

      <form action="./order.php" method="post" style="display: flex; align-self:center">
        <div class="text">
          <input type="text" name="car" id="car" list="carOptions" placeholder="Select an Available Car" pattern="Honda CR-V|Nissan Sentra|Suzuki Swift Sport" onclick="$('form').trigger('reset');" required />
          <span></span>
          <datalist id="carOptions">
            <option value="Honda CR-V"></option>
            <option value="Nissan Sentra"></option>
            <option value="Suzuki Swift Sport"></option>
          </datalist>

        </div>
        <img id="cars" width="100%" hidden style="margin-bottom: 30px;">
        <div style="display: flex;width:100%; flex-direction:column">
          <button type='button' onclick="displayCar()">Display car</button>
          <span style="display: flex; flex-direction:row; align-items:center; width:100%;justify-content: space-between;">
            <button type="submit" value="Submit">Order Now</button>
            <button type="reset" onclick="location.reload()">Reset</button>
          </span>
          <a href='./'>Go to home page</a>
        </div>
      </form>

    </div>

  </div>
  <script src="./scripts/jquery-3.7.1.js"></script>
  <script>
    const option = document.getElementById('car');
    const img = $('#cars');

    function displayCar() {
      if (img.attr('hidden')) {
        img.removeAttr('hidden')
      }
      if (img.attr('src')) {
        img.removeAttr('src')
        img.removeAttr('alt')
      }
      switch (option.value) {
        case 'Honda CR-V':
          img.attr({
            src: "./images/honda.jpg",
            alt: "Red Honda CR-V HYBRID"
          })
          break;
        case 'Nissan Sentra':
          img.attr({
            src: './images/nissan.jpg',
            alt: 'White Nissan Sentra'
          })
          break;
          case 'Suzuki Swift Sport':
            img.attr({
            src: './images/suzuki.jpg',
            alt: 'Yellow Suzuki Swift Sport'
          })
          break;
      }
    }
  </script>
</body>

</html>