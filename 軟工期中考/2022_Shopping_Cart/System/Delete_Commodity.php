<?php
    // print_r($_POST["All_Wanted_Delete_Datas_Id"][0]);

    include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫

    $All_Wanted_Delete_Datas_Id = json_decode($_POST["All_Wanted_Delete_Datas_Id"]);
    for($x=0; $x<count($All_Wanted_Delete_Datas_Id); $x++) {
        $result_Delete_Commodity = mysqli_query($Shopping_Cart, "DELETE FROM `commodity_details` WHERE `Commodity_Id`='".$All_Wanted_Delete_Datas_Id[$x]."';");
    }
?>