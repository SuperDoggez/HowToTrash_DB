<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');

    //check connection
    if (mysqli_connect_errno()){
        echo "1 : Connection Failed"; // log code 1 = failed
        exit();
    }

    $username = $_POST["name"];
    $password = $_POST["password"];
    
    //ชื่อซ้ำ
    $namecheckquery = "SELECT Username, salt, hash, hasCharacter FROM account WHERE Username='" . $username . "';";
    $namecheck = mysqli_query($con, $namecheckquery) or die("2 : Name check query Failed" . mysqli_error($con)); //log code 2 = name check query failed
    if(mysqli_num_rows($namecheck) != 1)
    {
        echo "5 : User Not Found !";
        exit();
    }

    //get login Info from query
    $existinginfo = mysqli_fetch_assoc($namecheck);
    $salt = $existinginfo["salt"];
    $hash = $existinginfo["hash"];
    
    $loginhash = crypt($password, $salt);
    if ($hash != $loginhash){
        echo "6 : Incorrect Password";
        exit();
    }  


    echo "0\t" . $existinginfo["score"] . "\t" . $existinginfo["hasCharacter"] . "\t" . $existinginfo["CharacterID"];

    mysqli_close($con);
    
?>