<?php
    $host = 'localhost';    //資料庫網址
    $dbuser ='root';    //登錄用戶
    $dbpassword = '';    //密碼
    $dbname = '1121hw_bidding';    //要訪問的資料表單
    $Bidding = mysqli_connect($host,$dbuser,$dbpassword,$dbname);    //鏈接


    // $result = mysqli_query($Oder_Online, 
    //     "SELECT `Shop_User_Id`, `Shop_User_Password` 
    //     FROM `shop_user` 
    //     WHERE `Shop_User_Id` = '" . $_POST["Shop_User_Id"] . "'; ");

    // $Datas = [];
    // // 如果有資料
    // if ($result) {
    //     // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
    //     if (mysqli_num_rows($result)>0) {
    //         // 取得大於0代表有資料
    //         // while迴圈會根據資料數量，決定跑的次數
    //         // mysqli_fetch_assoc方法可取得一筆值
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             // 每跑一次迴圈就抓一筆值，最後放進data陣列中
    //             $Datas[] = $row;
    //         }
    //     }
    //     // else {
    //     //     header("Location: ./Shop_Login.html");
    //     //     echo "no result";
    //     // }
    //     // 釋放資料庫查到的記憶體
    //     mysqli_free_result($result);
    // }
?>