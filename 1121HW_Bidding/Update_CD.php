<?php
    // print_r($_POST);
    session_start();

    include "./Link_sql.php";

    $result = mysqli_query($Bidding, 
        "UPDATE `commodity_details` 
        SET `Commodity_End_Price`='".$_POST['New_Commodity_End_Price']."', 
        `Commodity_Buyer_Id`='".$_SESSION["User_Id"]."' 
        WHERE `Commodity_Id`='".$_POST['Commodity_Id']."';");

    echo "競拍成功";
?>