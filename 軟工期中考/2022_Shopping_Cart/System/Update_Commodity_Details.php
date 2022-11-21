<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改資料</title>

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
        #Update_Commodity_Form {
            position: relative;
            top: 50px;
            left: 5%;
            width: 90%;
            min-height: 100px;
            background-color: #999999;
            font-size: 18px;
        }
        .Input_Box {
            height: 40px;
        }
        input {
            font-size: 18px;
        }
        #Submit_Form {
            width: 100px;
            height: 40px;
            background-color: lightgreen;
            line-height: 40px;
            font-size: 18px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div id="Return_System_Main">返回首頁</div>
    <form id="Update_Commodity_Form" action="./Update_Commodity_Details_Comfirm.php" method="post"></form>

    <?php
        // print_r($_GET);
        include "C:/xampp/htdocs/2022_Shopping_Cart/System/Data_Base/Link_sql.php";  //鏈接資料庫
    
        $result_Commodity_Details = mysqli_query($Shopping_Cart, "SELECT * FROM `commodity_details` WHERE `Commodity_Id`=".$_GET['Commodity_Id'].";");
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
    
        // print_r($Datas_Commodity_Details);

        $Label_Text = ["商品Id", "商品名稱", "英文名稱", "剩餘數量"];
        $Text_Now = 0;
        $Update_Commodity_Form_innerHTMl = "";
        foreach($Datas_Commodity_Details[0] as $key => $value) {
            if($key == "Commodity_Id") {
                $input_innerHTML = "<input type='text' id='".$key."' name='".$key."' value='".$value."' readonly='true'>";
            }
            else {
                $input_innerHTML = "<input type='text' id='".$key."' name='".$key."' value='".$value."'>";
            }
            $Update_Commodity_Form_innerHTMl .= "<div class='Input_Box'>
                <label>".$Label_Text[$Text_Now].":</label>
                ".$input_innerHTML."
            </div>";
            $Text_Now += 1;
        }
        $Update_Commodity_Form_innerHTMl .= "<input type='submit' id='Submit_Form' value='更新'>";
        echo "<script>
            document.getElementById('Update_Commodity_Form').innerHTML = `$Update_Commodity_Form_innerHTMl`;
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

