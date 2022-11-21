<?php
    // print_r($_POST);

    include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫 

    $All_Buy_Commodity = json_decode($_POST["All_Buy_Commodity"]);
    // print_r($All_Buy_Commodity);
    for($x=0; $x<count($All_Buy_Commodity); $x++) {
        $result_Clear_Shopping_Cart = mysqli_query($Shopping_Cart, "UPDATE `commodity_details` SET `Commodity_Num`=`Commodity_Num`-".$All_Buy_Commodity[$x][1]." WHERE `Commodity_Id`='".$All_Buy_Commodity[$x][0]."';"); 
    }
    mysqli_query($Shopping_Cart, "DELETE FROM `shopping_cart` WHERE 1");  // 清除現有的購物車

    // header("Location: ./Shopping_Cart.php");
?>