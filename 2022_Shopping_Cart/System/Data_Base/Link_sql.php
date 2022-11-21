<?php
    $host = 'localhost';    //資料庫網址
    $dbuser ='root';    //登錄用戶
    $dbpassword = '';    //密碼
    $dbname = 'shopping_cart';    //要訪問的資料表單
    $Shopping_Cart = mysqli_connect($host,$dbuser,$dbpassword,$dbname);    //鏈接
    if($Shopping_Cart){
        // echo "<script>console.log('正確連接資料庫')</script>";
    }
    else {
        // echo '<script>console.log("不正確連接資料庫" , "' . mysqli_connect_error() . '")</script>';
    }

    // mysqli_close($Shopping_Cart);  //關閉資料庫連線
?>