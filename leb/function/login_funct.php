<?php
session_start();

if(isset($_SESSION['loggedin'])){
    header("Location: index.php");
    die();
}

if (isset($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['error'] = null;

    $host = "localhost";
    $username = "root";
    $password = "D@nc2204";
    $database = "islandmoverslb";
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
   
    $sql = mysqli_prepare($conn, "SELECT * FROM customers WHERE email_address=?");
    mysqli_stmt_bind_param($sql,'s', $_SESSION['email']);
    mysqli_stmt_execute($sql);
    mysqli_stmt_store_result($sql);
    mysqli_stmt_bind_result($sql, $id, $fname, $lname, $phone, $country, $region, $email, $pword);
    if(!$sql) {
        $_SESSION['error'] = "Incorrect email or password!";
        header("Location:../login.php");
        die();
    } else {   
        while (mysqli_stmt_fetch($sql)){
        
    
            $ps2 = $pword;
            $ps1 = $_SESSION['password'];
            if(password_verify($ps1, $ps2)) {
                $_SESSION['loggedin'] ="1";
                $_SESSION['id']=$id;
                header("Location: ../");
            }
            if(!password_verify($ps1, $ps2)){
                $_SESSION['error'] = "Incorrect email or password!";
                header("Location:../login.php");
        
        }}
    }
}