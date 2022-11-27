<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳情頁</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }
        html, body {
            background-color: #999;
        }
        #Login_Box {
            margin-right: 20px;
            width: 40px !important;
            height: 40px;
            background-color: #BDA075;
            border-radius: 50%;
        }
        #All_Commodity_On_Bidding {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 30px);
            width: 90%;
            font-size: 20px;
        }
        #All_Commodity_On_Bidding div {
            margin-bottom: 20px;
        }
        label {
            padding-right: 10px;
            display: inline-block;
            cursor: pointer;
            width: 200px;
            text-align: right;
        }
        input {
            padding: 5px;
            min-width: 200px;
            min-height: 30px;
            font-size: 16px;
            width: 300px;
            border: 1px solid #989898;
            outline: none;
        }
        #Bidding_Now_Box {
            margin-top: 50px;
        }
        #Bidding_Now {
            margin-left: 220px;
            margin-top: 20px;
            width: 150px;
            height: 40px;
            background-color: #2c2b2b;
            border-radius: 5px;
            color: #BDA075;
            text-align: center;
            line-height: 40px;
        }
    </style>

</head>
<body>
    <form id="All_Commodity_On_Bidding"></form>

    <?php
        include "./Link_sql.php";

        $result = mysqli_query($Bidding, 
            "SELECT * 
            FROM `commodity_details` 
            WHERE `Commodity_Id` = '".$_GET['C_Id']."'; ");

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
        $Form_innerHTML = "";
        $Form_Th_Id = ['Commodity_Id','Commodity_Name','Commodity_Mark','Commodity_Seller_Id','Commodity_Start_Price','Commodity_Bidding_Start_Time','Commodity_Bidding_End_Time','Commodity_End_Price','Commodity_Buyer_Id','Commodity_State','Lowest_Asking_Price'];
        $Form_Th_Name = ["商品Id","商品名稱","商品詳情","拍賣者","起拍價","起拍時間","結拍時間","當前競拍價格","競拍者","商品狀態","每次最低加價"];
        for($x=0; $x<count($Form_Th_Id); $x++) {
            if($x!=2 && $x!=4 && $x!=5&& $x!=9) {
                $Form_innerHTML .= "<div>";
                $Form_innerHTML .= "<label>".$Form_Th_Name[$x]."</label> <input name='".$Form_Th_Id[$x]."' value='".$Datas[0][$Form_Th_Id[$x]]."' readonly='true'>";
                $Form_innerHTML .= "</div>";
            }
        }
        

        if($Datas[0]["Commodity_State"] == "On_Bidding") {
            $Form_innerHTML .= "<div id='Bidding_Now_Box'>
                <label>競標</label> <input name='New_Commodity_End_Price'>
                <div id='Bidding_Now'>確認競標</div>
            </div>";
        }

        echo "<script>
            document.getElementById('All_Commodity_On_Bidding').innerHTML = `".$Form_innerHTML."`;
        </script>";
    ?>

    <script src="./jQuery_v3.6.1_min.js"></script>  <!-- jQuery -->
    <!-- 監控 -->
    <script>
        document.getElementById("Bidding_Now").addEventListener("click", function() {
            var Bid = document.getElementsByName("New_Commodity_End_Price")[0].value;
            var Price_Now = document.getElementsByName("Commodity_End_Price")[0].value;
            var LAP = document.getElementsByName("Lowest_Asking_Price")[0].value;
            console.log(Bid, Price_Now+LAP);
            if(parseInt(Bid) >= parseInt(Price_Now)+parseInt(LAP)) {
                $.ajax({
                    url: './Update_CD.php',  //要傳送的頁面
                    method: 'POST',  //使用 POST 方法傳送請求
                    dataType: 'text',  //回傳資料格式
                    data: $('form').serialize(),  //將表單資料用打包起來送出去
                    success: function(res){
                        // alert("資料修改成功");  // 确认更新
                        alert(res);
                    },
                });
                // return false;  // 阻止瀏覽器跳轉
                location.reload();
            }
            else {
                alert("加價小於最低加價");
            }
        });
    </script>
</body>
</html>