<?php
require("dbConnection.php");
$sql=<<<sqlText
select * from customer limit 3
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
    <link rel="stylesheet" href="customers.css">
</head>

<body>
    <div class="grid_container">
        <div class="rightbar" >
            <a id="btnfirst" href="neworder.php">新增訂單</a><br>
            <a id="btnsecond" href="addcustomer.php">新增客戶</a><br>
            <a id="btnthird" href="">客戶資料</a><br>
            <a id="btnforth" href="orderdetail.php">寄庫明細</a><br>
        </div>

        <form  action="">
            <h3>客戶資料</h3>
            <table>
                <tr>
                    <td>客戶編號</td>
                    <td>客戶名稱</td>
                    <td>連絡電話</td>
                    <td>地址</td>
                    <td>聯絡窗口</td>
                    <td>窗口分機</td>
                    <td>負責業務</td>
                    <td>統一編號</td>
                    <td>公司抬頭</td>
                    <td>編輯客戶</td>
                </tr>
               <?php while ($row=mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?=$row["customerId"] ?></td>
                    <td><?=$row["customerName"] ?></td>
                    <td><?=$row["phone"] ?></td>
                    <td><?=$row["address"] ?></td>
                    <td><?=$row["contactPerson"] ?></td>
                    <td><?=$row["extension"] ?></td>
                    <td><?=$row["sales"] ?></td>
                    <td><?=$row["uniformNumber"] ?></td>
                    <td><?=$row["headline"] ?></td>
                    <td>
                    <a class="edit" href="ed.php?id=<?= $row["customerId"] ?>">編輯</a>
                    </td>
                    
                </tr>
               <?php } ?>
                
                
                
                
                
            </table>
        </form>
  

    </div>
   
        

</body>

</html>