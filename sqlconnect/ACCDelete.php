<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');

    if (mysqli_connect_errno()) {
        echo "1: Connection Failed";
        exit();
    } else {
        echo "Connected successfully";
    }

    $username = $_POST["username"];

    $deleteQuery = "DELETE FROM account WHERE Username = '$username'";
    $result = mysqli_query($con, $deleteQuery);

    if (!$result) {
        die("2: Delete query failed" . mysqli_error($con));
    }
    
    echo "0: Data deleted successfully";
    mysqli_close($con);
?>
