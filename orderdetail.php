<?php
require("dbConnection.php");
$sql=<<<sqlText
select * from orders
sqlText;
$result=mysqli_query($link,$sql);
// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="orderdetail.css">
</head>

<body>
    <div class="grid_container">
        <div class="rightbar" >
            <a id="btnfirst" href="neworder.php">新增訂單</a><br>
            <a id="btnsecond" href="addcustomer.php">新增客戶</a><br>
            <a id="btnthird" href="customers.php">客戶資料</a><br>
            <a id="btnforth" href="orderdetail.php">寄庫明細</a><br>
        </div>

        <form method="post" action="">
            <h3>寄庫明細</h3>
            <table>
                <tr>
                    <td>訂單編號</td>
                    <td>寄庫日期</td>
                    <td>客戶編號</td>
                    <td>客戶名稱</td>
                    <td>品名</td>
                    <td>寄庫數量</td>
                    <td>寄庫剩餘</td>
                    <td>單位</td>
                    <td>單價</td>
                    <td>金額</td>
                    <td>出貨</td>
                </tr>

                <?php while ($row=mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?=$row["orderId"] ?></td>
                    <td><?=$row["orderDate"] ?> </td>
                    <td><?=$row["customerId"] ?></td>
                    <td><?=$row["customerName"] ?></td>
                    <td><?=$row["productName"] ?></td>
                    <td><?=$row["quantitys"] ?></td>
                    <td><?=$row["orderStock"] ?></td>
                    <td><?=$row["unit"] ?></td>
                    <td><?=$row["price"] ?></td>
                    <td><?=$row["total"] ?></td>
                    <td><a id="link" href="shipment.php?id=<?= $row["orderId"] ?>">出貨</a> </td>
                </tr>
                <?php } ?>
                
                
            </table>
        </form>
  

    </div>
   
        

</body>

</html>