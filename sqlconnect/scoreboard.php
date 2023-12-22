<?php

    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');

    if (mysqli_connect_errno()) {
        echo json_encode(array('status' => 'error', 'message' => 'Connection Failed'));
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $map1Query = "SELECT C.C_name, S.Score AS score
                    FROM `character` as C
                    JOIN score as S ON C.UID = S.UID
                    WHERE S.MapID = 1
                    ORDER BY S.Score DESC
                    LIMIT 1";

        $map1Result = mysqli_query($con, $map1Query);
        $map2Query = "SELECT C.C_name, S.Score AS score
                    FROM `character` as C
                    JOIN score as S ON C.UID = S.UID
                    WHERE S.MapID = 2
                    ORDER BY S.Score DESC
                    LIMIT 1";

        $map2Result = mysqli_query($con, $map2Query);

        if (!$map1Result || !$map2Result) {
            echo json_encode(array('status' => 'error', 'message' => 'Query execution error: ' . mysqli_error($con)));
            exit();
        }

        $map1Data = mysqli_fetch_assoc($map1Result);
        $map2Data = mysqli_fetch_assoc($map2Result);

        echo json_encode(array('status' => 'success', 'map1Data' => $map1Data, 'map2Data' => $map2Data));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Unsupported request method'));
    }
?>
