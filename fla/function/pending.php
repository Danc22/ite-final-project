<?php
function viewPending()
{
    $host = "localhost";
    $username = "root";
    $password = "D@nc2204";
    $database = "islandmoversfl";
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = mysqli_query($conn, "SELECT * FROM ride_info WHERE cust_id =" . $_SESSION['id']);
    if (!$sql) {
        $_SESSION['error'] = 'ERROR! Could not find user!';
        header('Location:../pending_rides.php');

    } elseif (mysqli_num_rows($sql) == 0) {
        echo 'No Rides Were Ever Booked!';
    } else {
        while ($row = mysqli_fetch_assoc($sql)) {
            $sql2 = mysqli_query($conn, "SELECT * FROM pending_rides WHERE Ride_id =" . $row['Ride_id']);
            if (!$sql2) {
                echo 'No Pending Rides!';
            } else {
                while($row = mysqli_fetch_assoc($sql2)){
                echo '
                    <div>
                    Pickup Date & Time: '.$row['pickupDate'].' <br/>
                Pick Up Location : ' . $row['Pickup_Location'] . '<br/>
                Destination: ' . $row['Dropoff_Location'] . '<br/>
                Ride Cost: $' . $row['Ride_Cost'] . '<br/>
                Discount Applicable:' . $row['Discount_applicable'] . '<br/>';
                $finalCost = ($row['Discount_applicable'] == "Yes") ? '5.00' : $row['Ride_Cost'];
                echo 'Final Cost = $' . $finalCost . '<br/>
        </div>
        <br/><br/>';}
            }
        }
    }
}
