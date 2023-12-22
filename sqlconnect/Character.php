<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $username = $_POST['username'];

    // has a character
    $query = "SELECT hasCharacter FROM account WHERE username = '$username'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $hasCharacter = $row['hasCharacter'];


        echo $hasCharacter;
    } else {

        echo "Player not found";
    }

?>
