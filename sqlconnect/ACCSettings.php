<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');

    if (mysqli_connect_errno()) {
        echo "1: Connection Failed";
        exit();
    } else {
        echo "Connected successfully";
    }

    $username = $_POST["username"];

    $getLoginInfoQuery = "SELECT salt, hash FROM account WHERE Username = '$username'";
    $result = mysqli_query($con, $getLoginInfoQuery);
    if (!$result) {
        die("2: Get login info query failed" . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);
    $salt = $row['salt'];


    $newPasswordHash = crypt($_POST["newPassword"], $salt);
    $updatePasswordQuery = "UPDATE account SET hash = '$newPasswordHash' WHERE Username = '$username'";
    mysqli_query($con, $updatePasswordQuery) or die("3: Update password query failed" . mysqli_error($con));
    echo "0: Password updated successfully";

    mysqli_close($con);
?>
