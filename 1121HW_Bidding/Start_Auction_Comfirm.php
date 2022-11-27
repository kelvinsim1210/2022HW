<?php
    print_r($_POST);

    include "./Link_sql.php";

    $All_Key = "";
    $All_Value = "";
    foreach($_POST as $key => $value) {
        $All_Key .= "`".$key."`,";
        $All_Value .= "'".$value."',";
    }

    $All_Key .= "`Commodity_State`,`Commodity_End_Price`";
    $All_Value .= "'On_Bidding','".$_POST['Commodity_Start_Price']."'";

    // $All_Key = substr($All_Key,0,-1);
    // $All_Value = substr($All_Value,0,-1);
    // echo $All_Value;

    $result = mysqli_query($Bidding, 
        "INSERT INTO `commodity_details`(".$All_Key.") VALUES (".$All_Value."); ");

    header("Location: ./Bidding_Commodity.php");
?>