<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');
    
    if (mysqli_connect_errno()) {
        echo "1: Connection Failed";
        exit();
    } else {
        echo "Connected successfully";
    }
    
    $username = $_POST["username"];
    $characterID = (int)$_POST["characterID"];
    $characterName = $_POST["characterName"];
    
    // Retrieve UID from the account table
    $uidQuery = "SELECT UID FROM account WHERE Username = '$username'";
    $uidResult = mysqli_query($con, $uidQuery);
    
    if ($uidResult) {
        $row = mysqli_fetch_assoc($uidResult);
        $uid = $row['UID'];
    
        // Check if the user already has a character
        $checkCharacterQuery = "SELECT UID FROM `character` WHERE UID = $uid";
        $result = mysqli_query($con, $checkCharacterQuery);
    
        if (mysqli_num_rows($result) > 0) {
            // ถ้ามีแล้ว update the existing record
            $updateQuery = "UPDATE `character` SET CharacterID = $characterID, C_name = '$characterName' WHERE UID = $uid";
        } else {
            //  ถ้าไม่มี insert a new record
            $updateQuery = "INSERT INTO `character` (UID, C_name, CharacterID) VALUES ($uid, '$characterName', $characterID)";
        }
    
        mysqli_query($con, $updateQuery) or die("2: Update character query failed: " . mysqli_error($con));
        error_log("Debug Message: CharacterID = " . $_POST["characterID"]);
    
        // Update the 'hasCharacter' 
        $updateAccountQuery = "UPDATE account SET hasCharacter = 1 WHERE Username = '$username'";
        mysqli_query($con, $updateAccountQuery) or die("3: Update account query failed: " . mysqli_error($con));
    
        error_log("Debug Message: CharacterID = " . $_POST["characterID"]);
    } else {
        echo "4: UID retrieval failed";
    }
    
    mysqli_close($con);
    ?>
    



