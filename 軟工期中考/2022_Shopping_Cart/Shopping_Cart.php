<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>

    <link rel="stylesheet" href="http://localhost/2022_Shopping_Cart/System/css/System_Defult_Setting.css">  <!-- 系統頁面默認設定 -->
    <style>
        #Return_Main {
            position: relative;
            top: 20px;
            left: 5%;
            width: 100px;
            height: 40px;
            border: 1px solid black;
            line-height: 40px;
            text-align: center;
        }   
        #Show_Commodity_Details_Table {
            position: relative;
            left: 5%;
            margin-top: 20px;
            width: 90%;
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        #Show_Commodity_Details_Table td {
            border: 1px solid black;
            height: 40px;
        }
        .Control_Unit_Btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 100px;
            height: 40px;
            background-color: orange;
            border: 1px solid black;
            font-size: 18px;
            text-align: center;
            line-height: 40px;
        }
        #Add_Commodity_To_Shopping_Cart {
            left: calc(100% - 200px);
            width: 180px;
        }
    </style>
</head>
<body>
    <div id="Return_Main">返回首頁</div>
    <table id="Show_Commodity_Details_Table"></table>
    <div id="Clear_Shopping_Cart" class="Control_Unit_Btn">結賬</div>

    <!-- 導出商品資料 -->
    <?php 
        include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫

        $result_Commodity_Details = mysqli_query($Shopping_Cart, "SELECT * FROM `shopping_cart` WHERE 1;");
        $Datas_Commodity_Details = [];
        // 如果有資料
        if ($result_Commodity_Details) {
            // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
            if (mysqli_num_rows($result_Commodity_Details)>0) {
                // 取得大於0代表有資料
                // while迴圈會根據資料數量，決定跑的次數
                // mysqli_fetch_assoc方法可取得一筆值
                while ($row = mysqli_fetch_assoc($result_Commodity_Details)) {
                    // 每跑一次迴圈就抓一筆值，最後放進data陣列中
                    $Datas_Commodity_Details[] = $row;
                }
            }
            // 釋放資料庫查到的記憶體
            mysqli_free_result($result_Commodity_Details);
        }
        mysqli_close($Shopping_Cart);  //關閉資料庫連線

        $Show_Commodity_Details_Table_innerHTML = "";

        $Table_Header_Id = ["Commodity_Id", "Commodity_Name_ch", "Commodity_Num"];
        $Table_Header_Text = ["商品編號", "商品名稱", "購買數量"];

        // 寫入標題
        $Show_Commodity_Details_Table_innerHTML .= "<tr id='Table_Header'>";
        for($x=0; $x<count($Table_Header_Id); $x++) {
            $Show_Commodity_Details_Table_innerHTML .= "<td id='".$Table_Header_Id[$x]."'>".$Table_Header_Text[$x]."</td>";
        }
        $Show_Commodity_Details_Table_innerHTML .= "</tr>";

        // 寫入內容
        for($x=0; $x<count($Datas_Commodity_Details); $x++) {
            $Show_Commodity_Details_Table_innerHTML .= "<tr>";
            for($y=0; $y<count($Table_Header_Id); $y++) {
                $Show_Commodity_Details_Table_innerHTML .= "<td class='".$Table_Header_Id[$y]."'>".$Datas_Commodity_Details[$x][$Table_Header_Id[$y]]."</td>";
            }
            $Show_Commodity_Details_Table_innerHTML .= "</tr>";
        }

        echo "<script>
            document.getElementById('Show_Commodity_Details_Table').innerHTML = `".$Show_Commodity_Details_Table_innerHTML."`;
        </script>";
    ?>

    <script src="http://localhost/2022_Shopping_Cart/System/jQuery/jQuery_v3.6.1_min.js"></script>  <!-- jquery -->

    <!-- 結賬 -->
    <script>
        document.getElementById("Clear_Shopping_Cart").addEventListener("click", function() {
            var All_Buy_Commodity = [];
            // var All_Commodity_Num = [];

            var Get_Commodity_Id = document.getElementsByClassName("Commodity_Id");
            var Get_Commodity_Num = document.getElementsByClassName("Commodity_Num");
            for(var x=0; x<Get_Commodity_Id.length; x++) {
                All_Buy_Commodity.push([Get_Commodity_Id[x].innerHTML, Get_Commodity_Num[x].innerHTML]);
            }
            $.ajax({
                url: './Clear_Shopping_Cart.php',  //要傳送的頁面
                method: 'POST',  //使用 POST 方法傳送請求
                dataType: 'text',  //回傳資料格式
                data: {All_Buy_Commodity: JSON.stringify(All_Buy_Commodity)},  //將表單資料用打包起來送出去
                success: function(res){
                    // alert(res);  // 确认更新
                    location.reload();
                },
            });
            // return false;  // 阻止瀏覽器跳轉
            // location.href = "./Shopping_Cart.php";
            // location.reload();
        });

        document.getElementById("Return_Main").addEventListener("click", function() {  // 返回首頁
            location.href = "./Main.php";
        });
    </script>
</body>
</html>