<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');

    // Check connection
    if (mysqli_connect_errno()) {
        echo "1: Connection Failed";
        exit();
    } else {
        echo "Connected successfully";
    }

    $score = (int)$_POST['score'];
    $mapID = (int)$_POST['mapID'];
    $username = mysqli_real_escape_string($con, $_POST['username']);

    $uidQuery = "SELECT UID FROM account WHERE Username = '$username'";
    $uidResult = mysqli_query($con, $uidQuery);

    if ($uidResult) {
        $row = mysqli_fetch_assoc($uidResult);
        $uid = (int)$row['UID'];

        $insertQuery = "INSERT INTO `score` (UID, MapID, Score) VALUES ($uid, $mapID, $score)";
        $result = mysqli_query($con, $insertQuery);

        if ($result) {
            echo "Score inserted successfully";
        } else {
            echo "Error inserting score: " . mysqli_error($con);
        }
    } else {
        echo "User not found";
    }

    mysqli_close($con);
?>
