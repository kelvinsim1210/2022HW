<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增商品</title>

    <link rel="stylesheet" href="http://localhost/2022_Shopping_Cart/System/css/System_Defult_Setting.css">  <!-- 系統頁面默認設定 -->
    <style>
        #Return_System_Main {
            position: relative;
            top: 20px;
            left: 5%;
            width: 100px;
            height: 40px;
            border: 1px solid black;
            line-height: 40px;
            text-align: center;
        }
        #Add_Commodity_Form {
            position: relative;
            left: 5%;
            top: 50px;
            /* margin-top: 50px; */
            /* padding: 10px; */
            width: 90%;
            background-color: #dddddd;
            font-size: 18px;
        }
        .Row_Clearfix {
            /* position: relative; */
            margin-bottom: 20px;
            width: 100%;
            height: 40px;
            border-bottom: 1px solid #777777
        }
        #Submit_Button {
            position: absolute;
            right: 20px;
            width: 100px;
            height: 40px;
        }
    </style>
</head>
<body>
    <div id="Return_System_Main">返回首頁</div>
    <form action="./Add_Commodity_Comfirm.php" method="post" id="Add_Commodity_Form">
        <div class='Row_Clearfix'>
            <label>商品編號：</label>
            <input type="text" id="Commodity_Id" name="Commodity_Id" readonly='true'>
        </div>
        <div class='Row_Clearfix'>
            <label>商品名稱：</label>
            <input type="text" id="Commodity_Id" name="Commodity_Name_ch">
        </div>
        <div class='Row_Clearfix'>
            <label>英文名稱：</label>
            <input type="text" id="Commodity_Id" name="Commodity_Name_en">
        </div>
        <div class='Row_Clearfix'>
            <label>商品數量：</label>
            <input type="text" id="Commodity_Id" name="Commodity_Num">
        </div>

        <button id="Submit_Button" type="submit">新增商品</button>
    </form>


    <!-- 生成商品編碼 -->
    <?php
        include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫

        $result_Count_Commodity_Details = mysqli_query($Shopping_Cart, "SELECT COUNT(*) AS 'Count' FROM `commodity_details` WHERE 1;");
        $Datas_Count_Commodity_Details = mysqli_fetch_assoc($result_Count_Commodity_Details);

        // echo $Datas_Count_Commodity_Details['Count'];
        echo "<script>
            document.getElementById('Commodity_Id').value = '".$Datas_Count_Commodity_Details['Count']."';
        </script>";
    ?>

    <!-- 監控 -->
    <script>
        // 返回首頁
        document.getElementById("Return_System_Main").addEventListener("click", function() {
            location.href = "System_Main.php";
        });
    </script>
</body>
</html>