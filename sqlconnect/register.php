<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');

    //check connection
    if (mysqli_connect_errno()){
        echo "1 : Connection Failed  "; // log code 1 = failed
        exit();
    }

    $username = $_POST["name"];
    $password = $_POST["password"];

    //ชื่อซ้ำ
    $namecheckquery = "SELECT Username FROM account WHERE Username='" . $username . "';";
    $namecheck = mysqli_query($con, $namecheckquery) or die("2 : Name check query Failed"); //log code 2 = name check query failed

    if (mysqli_num_rows($namecheck) > 0)
    {
        echo "3: Name already exists"; 
        exit();
    }
    
    //add user to table 
    $salt = "\$5\$rounds=5000\$" . "steamedhams" . $username . "\$";
    $hash = crypt($password, $salt);
    $insertuserquery = "INSERT INTO account (Username, hash, salt) VALUES ('" . $username . "', '" . $hash . "', '" . $salt . "');";
    mysqli_query($con, $insertuserquery) or die("4: Insert player query failed. " . mysqli_error($con));

    echo ("0");



?>