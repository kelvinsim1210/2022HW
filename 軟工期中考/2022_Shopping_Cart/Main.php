<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>

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
        .Select_Num {
            margin: 0 20px;
            width: 60px;
            text-align: center;
        }
        .Reduce_Num, .Add_Num {
            display: inline-block;
            position: relative;
            width: 20px;
            height: 20px;
            border: 1px solid black;
        }
        .Row, .Column {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: black;
        }
        .Row {
            width: 20px;
            height: 3px;
        }
        .Column {
            width: 3px;
            height: 20px;
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
    <div id="Control_Unit_Box">  <!-- 控制單元盒子 -->
        <!-- <div id="Add_Datas" class="Control_Unit">添加商品</div>
        <div id="Delete_Datas" class="Control_Unit">刪除商品</div> -->
    </div>
    <table id="Show_Commodity_Details_Table"></table>
    <div id="Shopping_Cart" class="Control_Unit_Btn">購物車</div>
    <div id="Add_Commodity_To_Shopping_Cart" class="Control_Unit_Btn">添加商品至購物車</div>

    <!-- 導出商品資料 -->
    <?php 
        include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫

        $result_Commodity_Details = mysqli_query($Shopping_Cart, "SELECT * FROM `commodity_details` WHERE `Commodity_Num`>0;");
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

        $Table_Header_Id = ["Commodity_Id", "Commodity_Name_ch", "Commodity_Num", "Add_To_Shopping_Cart"];
        $Table_Header_Text = ["商品編號", "商品名稱", "剩餘數量", "添加至購物車"];

        // 寫入標題
        $Show_Commodity_Details_Table_innerHTML .= "<tr id='Table_Header'>";
        for($x=0; $x<count($Table_Header_Id); $x++) {
            $Show_Commodity_Details_Table_innerHTML .= "<td id='".$Table_Header_Id[$x]."'>".$Table_Header_Text[$x]."</td>";
        }
        $Show_Commodity_Details_Table_innerHTML .= "</tr>";

        // 寫入內容
        for($x=0; $x<count($Datas_Commodity_Details); $x++) {
            // $Show_Commodity_Details_Table_innerHTML .= "<tr><td>
            //     <input type='checkbox' class='Selete_Delete_Datas' value='".$Datas_Commodity_Details[$x]['Commodity_Id']."'>
            // </td>";
            $Show_Commodity_Details_Table_innerHTML .= "<tr>";
            for($y=0; $y<count($Table_Header_Id)-1; $y++) {
                $Show_Commodity_Details_Table_innerHTML .= "<td class='".$Table_Header_Id[$y]."'>".$Datas_Commodity_Details[$x][$Table_Header_Id[$y]]."</td>";
            }
            $Show_Commodity_Details_Table_innerHTML .= "<td>
                <div class='Select_Num_Box'>
                    <input type='text' class='Select_Num' name='".$Datas_Commodity_Details[$x]['Commodity_Id']."' value='0'>
                </div>
            </td></tr>";
        }

        echo "<script>
            document.getElementById('Show_Commodity_Details_Table').innerHTML = `".$Show_Commodity_Details_Table_innerHTML."`;
        </script>";
    ?>

    <script src="http://localhost/2022_Shopping_Cart/System/jQuery/jQuery_v3.6.1_min.js"></script>  <!-- jquery -->

    <!-- 生成按鈕 -->
    <script>
        var All_Select_Num_Box = document.getElementsByClassName("Select_Num_Box");  // 所有數量輸入box
        for(var x=0; x<All_Select_Num_Box.length; x++) {
            All_Select_Num_Box[x].innerHTML = "<div class='Reduce_Num'><div class='Row'></div></div>" + All_Select_Num_Box[x].innerHTML + "<div class='Add_Num'><div class='Row'></div><div class='Column'></div></div>";
        }
    </script>

    <!-- 監控 -->
    <script>
        // 購物車
        document.getElementById("Shopping_Cart").addEventListener("click", function(){
            location.href = "./Shopping_Cart.php";
        });

        // 添加商品至購物車
        document.getElementById("Add_Commodity_To_Shopping_Cart").addEventListener("click", function(){
            var All_Buy_Commodity = [];  // 所有選購的商品
            var All_Select_Num = document.getElementsByClassName("Select_Num");
            var All_Commodity_Name_ch = document.getElementsByClassName("Commodity_Name_ch");
            for(var x=0; x<All_Select_Num.length; x++) {
                if(Number(All_Select_Num[x].value) > 0) {
                    All_Buy_Commodity.push([All_Select_Num[x].name, All_Select_Num[x].value, All_Commodity_Name_ch[x].innerHTML]);
                }
            }
            // console.log(All_Buy_Commodity);
            $.ajax({
                url: './Add_Commodity_To_Shopping_Cart.php',  //要傳送的頁面
                method: 'POST',  //使用 POST 方法傳送請求
                dataType: 'text',  //回傳資料格式
                data: {All_Buy_Commodity: JSON.stringify(All_Buy_Commodity)},  //將表單資料用打包起來送出去
                // success: function(res){
                //     alert(res);  // 确认更新
                // },
            });
            // return false;  // 阻止瀏覽器跳轉
            alert("添加成功");
        });

        var All_Reduce_Num = document.getElementsByClassName("Reduce_Num");
        var All_Add_Num = document.getElementsByClassName("Add_Num");
        for(var x=0; x<All_Reduce_Num.length; x++) {
            console.log(x);
            // 減少商品數量
            (function(x) {
                All_Reduce_Num[x].onclick = function(){
                    var Get_Num = document.getElementsByClassName("Select_Num")[x];
                    if(Get_Num.value > 0) {
                        Get_Num.value = Number(Get_Num.value)-1;
                    }
                };
            })(x);
            // 增加商品數量
            (function(x) {
                All_Add_Num[x].onclick = function(){
                    var Get_Num = document.getElementsByClassName("Select_Num")[x];
                    Get_Num.value = Number(Get_Num.value)+1;
                };
            })(x);
        }
    </script>
</body>
</html>