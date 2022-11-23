<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>競標商品</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }
        #All_Commodity_On_Bidding {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 30px);
            width: 80%;
        }
    </style>

</head>
<body>
    <table id="All_Commodity_On_Bidding"></table>

    <?php
        include "./Link_sql.php";

        $result = mysqli_query($Bidding, 
            "SELECT * 
            FROM `commodity_details` 
            WHERE `Commodity_State` = 'On_Bidding'; ");

        $Datas = [];
        // 如果有資料
        if ($result) {
            // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
            if (mysqli_num_rows($result)>0) {
                // 取得大於0代表有資料
                // while迴圈會根據資料數量，決定跑的次數
                // mysqli_fetch_assoc方法可取得一筆值
                while ($row = mysqli_fetch_assoc($result)) {
                    // 每跑一次迴圈就抓一筆值，最後放進data陣列中
                    $Datas[] = $row;
                }
            }
            // 釋放資料庫查到的記憶體
            mysqli_free_result($result);
        }

        // $text = "";
        // foreach($Datas[0] as $key => $value) {
        //     $text .= "'".$key."',";
        // }
        // echo $text;
        // print_r($Datas);
        $Table_innerHTML = "";
        $Table_Th_Id = ['Commodity_Id','Commodity_Name','Commodity_Mark','Commodity_Seller_Id','Commodity_Start_Price','Commodity_Bidding_Start_Time','Commodity_Bidding_End_Time','Commodity_End_Price','Commodity_Buyer_Id','Commodity_State','Lowest_Asking_Price'];
        $Table_Th_Name = ["商品Id","商品名稱","商品詳情","拍賣者","起拍價","起拍時間","結拍時間","當前競拍價格","競拍者","商品狀態","每次最低加價"];
        $Table_innerHTML .= "<tr>";
        for($x=0; $x<count($Table_Th_Id); $x++) {
            $Table_innerHTML .= "<td id='".$Table_Th_Id[$x]."'>".$Table_Th_Name[$x]."</td>";
        }
        $Table_innerHTML .= "</tr>";
        echo "<script>
            document.getElementById('All_Commodity_On_Bidding').innerHTML = `".$Table_innerHTML."`;
        </script>";
    ?>
</body>
</html>