<?php
    include "./Link_sql.php";

    $result = mysqli_query($Bidding, 
        "UPDATE `commodity_details` 
        SET `Commodity_State`='End_Bidding' 
        WHERE `Commodity_Bidding_End_Time`<now();");
?>