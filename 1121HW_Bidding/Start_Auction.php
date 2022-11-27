<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<style type="text/css">
body {
background-color:#6E6E6E;
width: 600px; 
margin:10px auto;
padding: 20px;
margin-top:20px;
border: 5px solid Thistle;
width: 600px;
line-height: 28px;
color:snow;
font-family:標楷體;
}
h1 {color:snow; text-align:center;}
table {margin: 15px auto; border: 4px solid Thistle; width:420px;margin-top:30px;}
td {text-align:left; padding:5px 10px;border:2px solid Thistle;}
th {padding:5px 10px; color:ivory;}
</style>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UI</title>
</head>
<body>
    <form id="f1" name="f1" action="./Start_Auction_Comfirm.php" method="post" >
        <table>
            <tr><th style="color:DarkGoldenrod" >輸入要拍賣的商品</th></tr>
            <tr><td>拍賣者</td><td><input type="text" name="Commodity_Seller_Id" readonly="true"></td></tr>
            <tr><td>商品id</td><td><input type="text" id="id" name="Commodity_Id" readonly="true"></td></tr>
            <tr><td>商品名稱</td><td><input type="text" id="name" name="Commodity_Name"/></td></tr>
            <tr><td>商品詳情</td><td><input type="text" name="Commodity_Mark"></td></tr>
            <tr><td>商品起始價格</td><td><input type="text" id="price" name="Commodity_Start_Price"/></td></tr>
            <tr><td>每次最低叫價</td><td><input type="text" id="low" name="Lowest_Asking_Price"/></td></tr>
            <tr><td>拍賣開始時間</td><td><input type="text" name="Commodity_Bidding_Start_Time" readonly="true"></td></tr>
            <tr><td>拍賣結束時間</td><td><input type="text" name="Commodity_Bidding_End_Time" readonly="true"></td></tr>
            
            <tr><td colspan="2" style="text-align:center"><input type="submit" value="新增"" /></td></tr>
        
        </table>
    </form>

    <?php
        // 拍賣者id
        session_start();
        $User_Now = $_SESSION["User_Id"];
        echo "<script>
            document.getElementsByName('Commodity_Seller_Id')[0].value = `".$User_Now."`;
        </script>";

        include "./Link_sql.php";
        
        // 商品id生成
        date_default_timezone_set('Asia/Taipei');  // 設定時區
        $Commodity_Id = "C".date('YmdGis');
        // echo $Commodity_Id;
        echo "<script>
            document.getElementsByName('Commodity_Id')[0].value = `".$Commodity_Id."`;
        </script>";

        // 拍賣開始時間
        date_default_timezone_set('Asia/Taipei');  // 設定時區
        $Time_Now = date('Y-m-d G:i:s');
        echo "<script>
            document.getElementsByName('Commodity_Bidding_Start_Time')[0].value = `".$Time_Now."`;
        </script>";

        // 拍賣結束時間
        $Time_End = date('Y-m-d G:i:s',strtotime("+3 minute"));
        echo "<script>
            document.getElementsByName('Commodity_Bidding_End_Time')[0].value = `".$Time_End."`;
        </script>";
    ?>
</body>
</html>