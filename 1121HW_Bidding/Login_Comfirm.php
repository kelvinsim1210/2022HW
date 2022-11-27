<?php
    // print_r($_POST);

    include "./Link_sql.php";

    $result = mysqli_query($Bidding, 
        "SELECT `User_Id` 
        FROM `user` 
        WHERE `User_Id` = '".$_POST["User_Id"]."'; ");

    $Datas = mysqli_fetch_assoc($result);
    
    if(!$Datas) {
        echo "no";
        $result = mysqli_query($Bidding, 
        "INSERT INTO `user`(`User_Id`) VALUES ('".$_POST['User_Id']."');");
    }
    else {
        echo "ok";
    }
    // print_r($Datas);

    session_start();
    $_SESSION["User_Id"] = $_POST["User_Id"];

    header("Location: ./Main.html");
?>