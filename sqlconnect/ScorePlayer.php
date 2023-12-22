<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');
    
    if (mysqli_connect_errno()) {
        echo json_encode(array('status' => 'error', 'message' => 'Connection Failed'));
        exit();
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["username"])) {
            $username = $_POST["username"];
    
            // Find UID from the account table 
            $uidQuery = "SELECT UID FROM account WHERE Username = '$username'";
            $uidResult = mysqli_query($con, $uidQuery);
    
            if (!$uidResult) {
                echo json_encode(array('status' => 'error', 'message' => 'Query execution error: ' . mysqli_error($con)));
                exit();
            }
    
            $uidData = mysqli_fetch_assoc($uidResult);
    
            if ($uidData) {
                $uid = $uidData['UID'];
                $map1Query = "SELECT S.Score AS score
                            FROM score as S
                            WHERE S.MapID = 1 AND S.UID = $uid
                            ORDER BY S.Score DESC
                            LIMIT 1";
                            
                $map2Query = "SELECT S.Score AS score
                            FROM score as S
                            WHERE S.MapID = 2 AND S.UID = $uid
                            ORDER BY S.Score DESC
                            LIMIT 1";
    
                $map1Result = mysqli_query($con, $map1Query);
                $map2Result = mysqli_query($con, $map2Query);


                if (!$map1Result) {
                    echo json_encode(array('status' => 'error', 'message' => 'Query execution error: ' . mysqli_error($con)));
                    exit();
                }
                if (!$map2Result) {
                    echo json_encode(array('status' => 'error', 'message' => 'Query execution error: ' . mysqli_error($con)));
                    exit();
                }
    
                $map1Data = mysqli_fetch_assoc($map1Result);
                $map2Data = mysqli_fetch_assoc($map2Result);
    
                echo json_encode(array('status' => 'success', 'map1Data' => $map1Data, 'map2Data' => $map2Data));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'UID not found for the given username'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Username parameter missing in the POST request'));
        } 
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Unsupported request method'));
    }
    

?>
