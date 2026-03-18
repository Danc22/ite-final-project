<?php
session_start();
if (!isset($_SESSION['region'])){
    header('Location: ../location.php');
    die();
  }
if(isset($_SESSION['loggedin'])){
    header("Location: ../");
    die();
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['pword2'];
    $hashed = password_hash($password,  PASSWORD_BCRYPT);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $telephone = $_POST['tele'];
    $passValid = '([\w]{6,})';
    $telVali ='([\d]{3}\-[\d]{4})';

    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) 
        || !preg_match($telVali,$telephone)
        || !preg_match($passValid, $password) ){
        $_SESSION['error'] = "Incorrect Formatting!";
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['tele'] = $telephone;
        header("Location:../signup_page.php");
        die();
    }

    if (!($password == $_POST['pword1'])) {
        $_SESSION['error'] = "Passwords do not Match!";
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['tele'] = $telephone;
        header("Location:../signup_page.php");
        die();
    } else {
        $id = (int)1;
        $host = "localhost";
        $username = "root";
        $password = "D@nc2204";
        $database = "islandmoversbd";
        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = mysqli_query($conn, "SELECT * FROM customers;");
        if (!$sql) {
            die('Error: ' . mysqli_error($conn));
        } else {
            while ($row = mysqli_fetch_assoc($sql)) {
                if ($id == $row['cust_id']) {
                    $id++;
                }
                if ($email == $row['email_address']) {
                    $_SESSION['error'] = "Email already in use!";
                    $_SESSION['fname'] = $fname;
                    $_SESSION['lname'] = $lname;
                    $_SESSION['tele'] = $telephone;
                    mysqli_close($conn);
                    header("Location:../login.php");
                }
            }
        }
        $sql2 = mysqli_prepare($conn, 'INSERT INTO customers 
        VALUES (?,?,?,?,?,?,?,?);');
        mysqli_stmt_bind_param($sql2, 'dsssssss', $id,$fname,$lname,$telephone, $_SESSION['country'], $_SESSION['region'],
            $email, $hashed);
        mysqli_stmt_execute($sql2);
        if ( !mysqli_stmt_execute($sql2)) {
            die('Error: ' . mysqli_error($conn));
        } else {
            mysqli_close($conn);
            $_SESSION['loggedin'] = "1";
            $_SESSION['id'] = $id;
            header("Location: ../");
        }
    }
}
?>