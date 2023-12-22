<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Get the username from Unity
    $username = $_POST['username'];

    // player has a character
    $query = "SELECT CharacterID FROM `character` WHERE UID = (SELECT UID FROM account WHERE Username = '$username')";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        // Player found in the database
        $row = $result->fetch_assoc();
        $characterID = (int)$row['CharacterID'];

        echo $characterID;
    } else {
        echo "Player not found";
    }

?>
