<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');

    if (mysqli_connect_errno()) {
        echo "1: Connection Failed";
        exit();
    } else {
        echo "Connected successfully";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST["username"];
        $playerProgress = (int)$_POST['playerProgress'];
        $score = (int)$_POST['score'];
        $mapID = (int)$_POST['mapID'];

        $uidQuery = "SELECT UID FROM account WHERE Username = '$username'";
        $uidResult = mysqli_query($con, $uidQuery);

        if ($uidResult) {
            $row = mysqli_fetch_assoc($uidResult);
            $uid = $row['UID'];
            $updateQuery = "UPDATE level SET PlayerProgress = $playerProgress WHERE UID = $uid";
            mysqli_query($con, $updateQuery);

            $insertQuery = "INSERT INTO `score` (UID, MapID, Score) VALUES ($uid, $mapID, $score)";
            $result = mysqli_query($con, $insertQuery);

            if ($result) {
                echo "Score inserted successfully";
            } else {
                echo "Error inserting score: " . mysqli_error($con);
            }


            $response = array('status' => 'success', 'message' => 'Player progress updated successfully');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Unable to fetch UID');
            echo json_encode($response);
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Unsupported request method');
        echo json_encode($response);
    }
?>
