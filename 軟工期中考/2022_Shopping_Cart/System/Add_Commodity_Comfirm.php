<?php
    // print_r($_POST);
    include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫

    $All_Data_key = "";
    $All_Data_value = "";
    foreach($_POST as $key => $value) {
        $All_Data_key .= "`".$key."`,";
        $All_Data_value .= "'".$value."',";
    }
    $All_Data_key = substr($All_Data_key,0,-1);  // 去掉最後一個逗號
    $All_Data_value = substr($All_Data_value,0,-1);  // 去掉最後一個逗號
    $result_Add_Commodity = mysqli_query($Shopping_Cart, "INSERT INTO `commodity_details`(".$All_Data_key.") VALUES (".$All_Data_value.");");

    header("Location: ./Add_Commodity.php");  // 返回頁面
?>