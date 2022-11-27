<?php
    session_start();
    if(!isset($_SESSION)) {
        header("Location: ./Login.html");
    }
?>

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
        html, body {
            background-color: #999999;
        }
        #Login_Box {
            margin-right: 20px;
            width: 40px !important;
            height: 40px;
            background-color: #BDA075;
            border-radius: 50%;
        }
        #Menu {
            display: flex;
            position: relative;
            width: 100%;
            height: 100px;
            background-color: #2c2b2b;
            font-size: 18px;
            color: #BDA075;
            text-align: center;
            align-items: center;
        }
        #Menu div {
            /* display: inline-block; */
            width: 25%;
            line-height: 100px;
        }
        /* #Menu div:hover {
            background-color: #BDA075;
            color: #2c2b2b;
        } */
        #Menu a {
            color: #BDA075;
        }
        #All_Commodity_On_Bidding {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 30px);
            width: 90%;
            border-collapse: collapse;
            text-align: center;
            font-size: 20px;
        }
        #All_Commodity_On_Bidding  td {
            padding: 3px;
            border: 1px solid #000;
        }
    </style>

</head>
<body>
    <div id="Menu">
        <div><a href="./Start_Auction.php">發起拍賣</a></div>
        <div><a href="./Bidding_Commodity.php">競標商品</a></div>
        <div><a href="./Auction_Record.php">拍賣記錄</a></div>
        <div><a href="./Bidding_Record.php">競標記錄</a></div>
        <div id="Login_Box"></div>
    </div>

    <table id="All_Commodity_On_Bidding"></table>

    <script src="./Default_Setting.js"></script>  <!-- 基礎設定 -->

    <?php
        include "./Link_sql.php";

        $result = mysqli_query($Bidding, 
            "SELECT * 
            FROM `commodity_details` 
            WHERE `Commodity_Buyer_Id` = '".$_SESSION['User_Id']."'; ");

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
            if($x!=2 && $x!=4 && $x!=5) {
                $Table_innerHTML .= "<td id='".$Table_Th_Id[$x]."'>".$Table_Th_Name[$x]."</td>";
            }
        }
        $Table_innerHTML .= "</tr>";
        for($x=0; $x<count($Datas); $x++) {
            $Table_innerHTML .= "<tr>";
            for($y=0; $y<count($Table_Th_Id); $y++) {
                if($y!=2 && $y!=4 && $y!=5) {
                    if($y==0) {
                        $Table_innerHTML .= "<td><a href='./Commodity_Details.php?C_Id=".$Datas[$x][$Table_Th_Id[$y]]."' target='_blank'>".$Datas[$x][$Table_Th_Id[$y]]."</a></td>";
                    }
                    else {
                        $Table_innerHTML .= "<td>".$Datas[$x][$Table_Th_Id[$y]]."</td>";
                    }
                }
            }
            $Table_innerHTML .= "</tr>";
        }
        echo "<script>
            document.getElementById('All_Commodity_On_Bidding').innerHTML = `".$Table_innerHTML."`;
        </script>";
    ?>
</body>
</html>