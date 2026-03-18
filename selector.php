<?php
session_start();
if(isset($_SESSION['location']) && $_SESSION['region']){
    session_unset();
}
$_SESSION['location'] = $_POST['loc'];
switch($_SESSION['location']){
    case 'Barbados':
        $_SESSION['region'] = 'Caribbean';
        header("Location:./bbd");
        break;
    case 'Dominica':
        $_SESSION['region'] = 'Caribbean';
        header("Location:./dma");
        break;
    case "St Vincent":
        $_SESSION['region'] = 'Caribbean';
        header("Location:./svt");
        break;
    case 'Florida':
        $_SESSION['region'] = 'United States';
        header("Location:./fla");
        break;
    case 'Dubai':
        $_SESSION['region'] = 'Middle East';
        header("Location:./dub");
        break;
    case 'Lebanon':
        $_SESSION['region'] = 'Middle East';
        header("Location:./leb");
        break;
}
?>
