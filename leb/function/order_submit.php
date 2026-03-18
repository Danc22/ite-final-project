<?php
session_start();
if (!isset($_SESSION['region'])) {
    header('Location: ../location.php');
    die();
}
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login.php");
    die();
}
$car = $_POST['car'];
$ploc = $_POST['ploc'];
$dloc = $_POST['dloc'];
$carValid1 = 'Honda CR-V';
$carValid2 = 'Nissan Sentra';
$carValid3 = 'Suzuki Swift Sport';
$otime =  date('Y-m-d H:i:s', strtotime($_POST['otime']));
$ptime = date('Y-m-d H:i:s', strtotime($_POST['ptime']));


if (!($car == $carValid1 || $car == $carValid2 || $car == $carValid3) || !$otime || !$ptime || !$ploc || !$dloc) {
    $_SESSION['error'] = 'Incorrect Formatting';
    $_SESSION['otime'] = $otime;
    $_SESSION['ptime'] = $ptime;
    $_SESSION['dloc'] = $dloc;
    $_SESSION['ploc'] = $ploc;
    $_SESSION['car'] = $car;
    header('Location: ../order.php');
}
$host = "localhost";
$username = "root";
$password = "D@nc2204";
$database = "islandmoverslb";
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = mysqli_query($conn, "SELECT * FROM customers WHERE cust_id =" . $_SESSION['id'] . "");
if (!$sql || mysqli_num_rows($sql) == 0) {
    $_SESSION['error'] = 'ERROR! Could not find user!';
    $_SESSION['otime'] = $otime;
    $_SESSION['ptime'] = $ptime;
    $_SESSION['dloc'] = $dloc;
    $_SESSION['ploc'] = $ploc;
    $_SESSION['car'] = $car;
    header('Location:../order.php');
} else {
    while ($row = mysqli_fetch_assoc($sql)) {
        $sql2 = mysqli_prepare($conn, 'SELECT * FROM vehicle_info  WHERE Vechicle_type =? LIMIT 1');
        mysqli_stmt_bind_param($sql2, 's', $car);
        mysqli_stmt_execute($sql2);
        mysqli_stmt_store_result($sql2);

        mysqli_stmt_bind_result($sql2, $vehicleId, $type);

        $sql0 = mysqli_query($conn, "SELECT * FROM ride_info");
        $rideid = 1;
        if (!$sql0) {
            $_SESSION['error'] = 'ERROR!';
            $_SESSION['otime'] = $otime;
            $_SESSION['ptime'] = $ptime;
            $_SESSION['dloc'] = $dloc;
            $_SESSION['ploc'] = $ploc;
            $_SESSION['car'] = $car;
            header('Location:../order.php');
        }
        
        else{
            while ($row = mysqli_fetch_assoc($sql0)){
                if($row['Ride_id']== $rideid) {$rideid++;}
            }
        }


        while (mysqli_stmt_fetch($sql2)) {
            $sql3 = mysqli_prepare($conn, 'INSERT INTO ride_info VALUES ( ?, ?, ?, ?, ?, ?, ?)');
            mysqli_stmt_bind_param($sql3, 'dddssss', $rideid, $_SESSION['id'], $vehicleId, $otime, $ploc, $dloc, $ptime);
            if (!mysqli_stmt_execute($sql3) ){
                header('Location:../order.php');
                $_SESSION['error'] = 'ERROR!';
                $_SESSION['otime'] = $otime;
                $_SESSION['ptime'] = $ptime;
                $_SESSION['dloc'] = $dloc;
                $_SESSION['ploc'] = $ploc;
                $_SESSION['car'] = $car;

            } else {

                $discount = (date('l', strtotime($ptime)) == 'Tuesday') ? "Yes" : "No";
                $cost = number_format(mt_rand(0, 99999) / 100, 2);

                $sql01 = mysqli_query($conn, "SELECT * FROM pending_rides");
                $pendid = 1;
                if (!$sql01) {
                    $_SESSION['error'] = 'ERROR!';
                    $_SESSION['otime'] = $otime;
                    $_SESSION['ptime'] = $ptime;
                    $_SESSION['dloc'] = $dloc;
                    $_SESSION['ploc'] = $ploc;
                    $_SESSION['car'] = $car;
                    header('Location:../order.php');
                }else{
                    while ($row = mysqli_fetch_assoc($sql01)){
                        if($row['Pending_ride_id']== $pendid) {$pendid++;}
                    }
                }
                $sql4 = mysqli_prepare($conn,'INSERT INTO pending_rides VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
                mysqli_stmt_bind_param($sql4, 'ddssdsss', $pendid, $rideid, $ploc, $dloc, $cost, $otime, $discount, $ptime);
                if (!mysqli_stmt_execute($sql4)) {
                    $_SESSION['otime'] = $otime;
                    $_SESSION['ptime'] = $ptime;
                    $_SESSION['dloc'] = $dloc;
                    $_SESSION['ploc'] = $ploc;
                    $_SESSION['car'] = $car;
                    $_SESSION['error'] = 'ERROR!';
                    header('Location:../order.php');
                } else {
                    header('Location:../pending_rides.php');
                }
            }
        }
    }
}
