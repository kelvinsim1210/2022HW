<?php
    // print_r($_POST);
    include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫 
    
    $All_Buy_Commodity = json_decode($_POST["All_Buy_Commodity"]);
    print_r($All_Buy_Commodity);
    for($x=0; $x<count($All_Buy_Commodity); $x++) {
        $result_Add_Buy_Commodity = mysqli_query($Shopping_Cart, "INSERT INTO `shopping_cart`(`Commodity_Name_ch`, `Commodity_Num`, `Commodity_Id`) VALUES ('".$All_Buy_Commodity[$x][2]."','".$All_Buy_Commodity[$x][1]."', '".$All_Buy_Commodity[$x][0]."');"); 
    } 
?>