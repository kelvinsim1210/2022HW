<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台首頁</title>

    <link rel="stylesheet" href="http://localhost/2022_Shopping_Cart/System/css/System_Defult_Setting.css">  <!-- 系統頁面默認設定 -->
    <style>
        #Control_Unit_Box {
            display: grid;  
            grid-template-columns: repeat(auto-fill, 100px);
            grid-gap: 20px;  /* 每個格子間距 */
            position: relative;
            left: 5%;
            margin-top: 20px;
            width: 90%;
            /* background-color: yellow; */
        }
        .Control_Unit {
            /* width: 100px; */
            height: 40px;
            background-color: #999999;
            border: 1px solid black;
            text-align: center;
            line-height: 40px;
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
    </style>
</head>
<body>
    <div id="Control_Unit_Box">  <!-- 控制單元盒子 -->
        <div id="Add_Datas" class="Control_Unit">添加商品</div>
        <div id="Delete_Datas" class="Control_Unit">刪除商品</div>
    </div>
    <table id="Show_Commodity_Details_Table"></table>

    <!-- 導出商品資料 -->
    <?php 
        include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫

        $result_Commodity_Details = mysqli_query($Shopping_Cart, "SELECT * FROM `commodity_details` WHERE 1;");
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

        $Table_Header_Id = ["Delete_Select", "Commodity_Id", "Commodity_Name_ch", "Commodity_Num", "Update_Details"];
        $Table_Header_Text = ["刪除", "商品編號", "商品名稱", "剩餘數量", "修改"];

        // 寫入標題
        $Show_Commodity_Details_Table_innerHTML .= "<tr id='Table_Header'>";
        for($x=0; $x<count($Table_Header_Id); $x++) {
            $Show_Commodity_Details_Table_innerHTML .= "<td id='".$Table_Header_Id[$x]."'>".$Table_Header_Text[$x]."</td>";
        }
        $Show_Commodity_Details_Table_innerHTML .= "</tr>";

        // 寫入內容
        for($x=0; $x<count($Datas_Commodity_Details); $x++) {
            $Show_Commodity_Details_Table_innerHTML .= "<tr><td>
                <input type='checkbox' class='Selete_Delete_Datas' value='".$Datas_Commodity_Details[$x]['Commodity_Id']."'>
            </td>";
            for($y=1; $y<count($Table_Header_Id)-1; $y++) {
                $Show_Commodity_Details_Table_innerHTML .= "<td>".$Datas_Commodity_Details[$x][$Table_Header_Id[$y]]."</td>";
            }
            $Show_Commodity_Details_Table_innerHTML .= "<td><a href='./Update_Commodity_Details.php?Commodity_Id=".$Datas_Commodity_Details[$x]['Commodity_Id']."'>修改</a></td></tr>";
        }

        echo "<script>
            document.getElementById('Show_Commodity_Details_Table').innerHTML = `".$Show_Commodity_Details_Table_innerHTML."`;
        </script>";
    ?>

    <script src="http://localhost/2022_Shopping_Cart/System/jQuery/jQuery_v3.6.1_min.js"></script>  <!-- jquery -->
    <!-- 監控 -->
    <script>
        // 新增商品
        document.getElementById("Add_Datas").addEventListener("click", function() {
            location.href = "./Add_Commodity.php";
        });

        // 刪除商品
        document.getElementById("Delete_Datas").addEventListener("click", function() {
            // location.href = "./Delete_Commodity.php";
            var All_Wanted_Delete_Datas_Id = [];
            var All_CB = document.getElementsByClassName("Selete_Delete_Datas");
            for(var x=0; x<All_CB.length; x++) {  //曆邊所有cb
                if(All_CB[x].checked == true) {
                    All_Wanted_Delete_Datas_Id.push(All_CB[x].value);
                }
            }

            $.ajax({
                url: './Delete_Commodity.php',  //要傳送的頁面
                method: 'POST',  //使用 POST 方法傳送請求
                dataType: 'text',  //回傳資料格式
                data: {All_Wanted_Delete_Datas_Id: JSON.stringify(All_Wanted_Delete_Datas_Id)},  //將表單資料用打包起來送出去
                // success: function(res){
                //     alert(res);  // 确认更新
                // },
            });
            location.reload();
        });
    </script>
</body>
</html>