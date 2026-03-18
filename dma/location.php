<?php
session_start();
$url = "https://freeipapi.com/api/json/";
$response = file_get_contents($url);
$data = json_decode($response, true);

switch ($data['countryName']) {
    case 'Barbados':
        $_SESSION['region'] = 'Caribbean';
        $_SESSION['incorrectLocation'] = "true";
        $message = 'This is not the version for your location<br/>
        please click the following button to be redirected to the correct site or click "continue" to proceed with restricted access
        <a href="../bbd">islandMovers Barbados</a>';
        break;
    case 'Dominica':
        $_SESSION['country'] = 'Dominica';
        $_SESSION['region'] = 'Caribbean';
        unset($_SESSION['incorrecLocation']);
        header('Location: ./');
        die();

        break;
    case 'Saint Vincent and The Grenadines':
        $_SESSION['region'] = 'Caribbean';
        $_SESSION['incorrectLocation'] = "true";
        $message = 'This is not the version for your location<br/>
        please click the following button to be redirected to the correct site or click "continue" to proceed with restricted access
        <a href="../svt">islandMovers St. Vincent</a>';
        break;
    case 'United States of America':
        $_SESSION['incorrectLocation'] = "true";
        $_SESSION['region'] = 'USA';
        if ($data['regionName'] == 'Florida') {
            $message = 'This is not the version for your location<br/>
            please click the following button to be redirected to the correct site or click "continue" to proceed with restricted access
            <a href="../fla">islandMovers Florida</a>';
        } else {
            $message = 'This is service is not availabe for your location<br/>
            click "continue" to proceed with restricted access';
        }
        break;
    case 'United Arab Emirates':
        $_SESSION['region'] = 'Middle East';
        $_SESSION['incorrectLocation'] = "true";
        if ($data['cityName'] == 'Dubai') {
            $message = 'This is not the version for your location<br/>
            please click the following button to be redirected to the correct site or click "continue" to proceed with restricted access
            <a href="../dub">islandMovers Dubai</a>';
        } else {
            $message = 'This is service is not availabe for your location<br/>
            click "continue" to proceed with restricted access';
        }
        break;
    case 'Lebanon':
        $_SESSION['region'] = 'Middle East';
        $_SESSION['incorrectLocation'] = "true";
        $message = 'This is not the version for your location<br/>
            please click the following button to be redirected to the correct site or click "continue" to proceed with restricted access
            <a href="../leb">islandMovers Lebanon</a>';
        break;
    default:
        $_SESSION['incorrectLocation'] = "true";
        $_SESSION['region'] = $data['continent'];
        $message = 'This is service is not availabe for your location<br/>
            click "continue" to proceed with restricted access';
        break;
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
    <title>Barbados</title>
</head>

<body>
    <div id="main">
        <div id="mainTextBox">
            <h1><span> IslandMovers - <?php echo $_SESSION['region']; ?></span></h1>
            <?php echo $message; ?>
            <a href="./">Continue</a>

        </div>

    </div>
</body>

</html>