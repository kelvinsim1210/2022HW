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
<title>拍賣紀錄</title>
</head>
<body>
<form action="ui3.php" id="f1" name="f1" method="post" >
<table>
<?php
    include "condb.php";
    //檢查資料庫內的值
    $sql = "SELECT * FROM `commodity_details`";
    $result=mysqli_query($db_link,$sql);
    if (mysqli_num_rows($result)>0) {
        while ($row=mysqli_fetch_assoc($result)) {
            $datas[]=$row;
        }
        mysqli_free_result($result);  
        
		echo "<tr><td><b>id</b></td><td><b>name</b></td><td><b>mark</b></td><td><b>seller_id</b></td><td><b>start_price</b><td><b>start_time</b><td><b>end_time</b><td><b>end_price</b><td><b>buyer_id</b><td><b>state</b></tr>";
        foreach ($datas as $key => $row) { 
		    echo "<tr><td>".$row["Commodity_Id"]."</td><td>".$row["Commodity_Name"]."</td><td>".$row["Commodity_Mark"]."</td><td>".$row["Commodity_Seller_Id"]."</td><td>".$row["Commodity_Start_Price"]."</td><td>".$row["Commodity_Bidding_Start_Time"]."</td><td>".$row["Commodity_Bidding_End_Time"]."</td><td>".$row["Commodity_End_Price"]."</td><td>".$row["Commodity_Buyer_Id"]."</td><td>".$row["Commodity_State"]."</td></tr>";
		    
            
        }
    } 
?>
</table>
</form>
</body>
</html>