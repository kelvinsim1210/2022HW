<?php
    print_r($_POST);

    include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫

    $result_Update_Commodity = mysqli_query($Shopping_Cart, 
        "UPDATE `commodity_details` 
        SET `Commodity_Name_ch`='".$_POST['Commodity_Name_ch']."',`Commodity_Name_en`='".$_POST['Commodity_Name_en']."',`Commodity_Num`='".$_POST['Commodity_Num']."' 
        WHERE `Commodity_Id`='".$_POST['Commodity_Id']."';");

    header("Location: ./System_Main.php");  // 返回頁面
?>