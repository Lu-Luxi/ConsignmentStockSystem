<?php
require("dbConnection.php");

$id = $_GET["id"];
$sql = <<<sqlText
select o.customerId,c.customerName, phone, address, contactPerson, extension, sales, uniformNumber, headline
 from customer as c join orders as o  on o.customerId = c.customerId
 where orderId=$id
sqlText;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$order = <<< sqlcontent
select * from orders
where orderId=$id
sqlcontent;
$consequency = mysqli_query($link, $order);
$num=mysqli_fetch_assoc($consequency);

if(isset($_POST["btnok"])){
    // print_r($_POST["orderStock"]);
    // print_r($_POST["shipQuantity"]);
    $last=$_POST["orderStock"]-$_POST["shipQuantity"];
    $ship=$_POST["shipQuantity"]*$_POST["price"];
    $total=$_POST["total"]-$ship;
    print_r($last);
    print_r($ship);
    print_r($total);
    $sqlCount = <<<sqlText
    update orders
      set orderStock = $last,
          total=$total
      where orderId = {$_POST["orderId"]}
    sqlText;
    mysqli_query($link, $sqlCount);
    header("location:orderdetail.php");

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="shipment.css">
</head>

<body>
    <div class="grid_container">
        <div class="rightbar" >
            <a id="btnfirst" href="neworder.php">新增訂單</a><br>
            <a id="btnsecond" href="addcustomer.php">新增客戶</a><br>
            <a id="btnthird" href="customers.php">客戶資料</a><br>
            <a id="btnforth" href="orderdetail.php">寄庫明細</a><br>
        </div>

        <form  method="post" action="">
            <h3>寄庫出貨</h3>
            <input type="submit" name="btnok" id="btnok" value="出貨" />      
            <!-- <input type="reset" name="btnReset" id="btnReset" value="重置" />       -->
            
            

            <label for="customerid">客戶編號:</label>
            <input class="customersquare" type="text" id="customerId" name="customerId" value="<?= $row["customerId"] ?>"readonly> &emsp;&emsp;&nbsp;
            

           
            <label for="customername">客戶名稱:</label>
            <input class="Square" type="text" id="customername" name="customername" value="<?= $row["customerName"] ?>" readonly> 


            <label for="phone">連絡電話:</label>     
            <input class="Square" type="text" id="phone" name="phone" value=" <?= $row["phone"] ?>" readonly><br> 

            <label for="address">聯絡地址:</label>
            <input class="Square" type="text" id="address" name="address" value="<?= $row["address"] ?>"readonly> 


            <label for="comp_name">公司抬頭:</label>
            <input class="Square" type="text" id="comp_name" name="comp_name" value="<?= $row["headline"] ?>"readonly> 


            <label for="comp_number">統一編號:</label>
            <input class="Square" type="text" id="comp_number" name="comp_number" value="<?= $row["uniformNumber"] ?>"readonly><br>

            <label for="window">聯絡窗口:</label> 
            <input class="Square" type="text" id="window" name="window" value="<?= $row["contactPerson"] ?>" readonly>

            <label for="windowphone">窗口電話:</label> 
            <input class="Square" type="text" id="windowphone" name="windowphone" value="<?= $row["extension"] ?>" readonly> 

            <label for="sales">負責業務:</label>
            <input class="Square" type="text" id="sales" name="sales" value="<?= $row["sales"] ?>" readonly><br>
            
            

         
         <table>
         <tr>
                    <td class="firstrow">訂單編號</td>
                    <td class="firstrow">品名</td>
                    <td class="firstrow">寄庫數量</td>
                    <td class="firstrow">寄庫剩餘</td>
                    <td class="firstrow">出庫數量</td>
                    <td class="firstrow">單位</td>
                    <td class="firstrow">單價</td>
                    <td class="firstrow">金額</td>
                    
                </tr>
                <tr>
                   <td><input class="insert" type="text" id="orderId" name="orderId" value="<?= $num["orderId"] ?>" readonly></td>
                   <td><input class="insert" type="text" id="productName" name="productName" value="<?= $num["productName"] ?>"readonly></td>
                   <td> <input  class="insert" type="quantitys" id="quantitys" name="quantitys" value="<?= $num["quantitys"] ?>"readonly></td>
                   <td><input class="insert" type="text" id="orderStock" name="orderStock" value="<?= $num["orderStock"] ?>"readonly></td>
                   <td><input class="insert" type="text" id="shipQuantity" name="shipQuantity" value=""></td>
                   <td>台斤</td>
                   <td><input class="insert" type="text" id="price" name="price" value="<?= $num["price"] ?>"readonly></td>
                   <td><input class="insert" type="text" id="total" name="total" value="<?= $num["total"] ?>" readonly></td>
                   
               </tr>
            </table>  
             </form>
    
    </div>
   
        

</body>

</html>