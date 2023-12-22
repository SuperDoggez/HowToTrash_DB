<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');

    if (mysqli_connect_errno()) {
        echo json_encode(array('status' => 'error', 'message' => 'Connection Failed'));
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST["username"];

        $uidQuery = "SELECT UID FROM account WHERE Username = '$username'";
        $uidResult = mysqli_query($con, $uidQuery);

        if ($uidResult) {
            $row = mysqli_fetch_assoc($uidResult);
            $uid = $row['UID'];
            $countQuery = "SELECT COUNT(*) as count FROM `level` WHERE UID = $uid";
            $countResult = mysqli_query($con, $countQuery);

            if ($countResult) {
                $count_row = mysqli_fetch_assoc($countResult);

                if ($count_row['count'] == 0) {
                    // Insert ถ้าไม่มี
                    $insertQuery = "INSERT INTO `level` (UID, PlayerProgress) VALUES ($uid, 1)";
                    $insertResult = mysqli_query($con, $insertQuery);

                    if (!$insertResult) {
                        echo "ERROR: Unable to insert player progress";
                    }
                }
            } else {
                echo "Already have data";
            }

            $progressQuery = "SELECT PlayerProgress FROM `level` WHERE UID = $uid";
            $progressResult = mysqli_query($con, $progressQuery);

            if ($progressResult) {
                $progress_row = mysqli_fetch_assoc($progressResult);
                if (is_numeric($progress_row['PlayerProgress'])) {
                    echo $progress_row['PlayerProgress'];
                } else {
                    echo "ERROR: Non-numeric value for player progress";
                }
            } else {
                echo "ERROR: Unable to fetch player progress";
            }
        } else {
            echo "ERROR: Unable to fetch UID";
        }
    } else {
        echo "ERROR: Unsupported request method";
    }
?>
