<?php
require("dbConnection.php");

if (isset($_POST["btnReset"])) {
  header("Location:enter.php");
}
if(isset($_POST["btnSelect"])){
  $sql = <<< sqlText
  select * from customer
  where customerId={$_POST["customerId"]}
  sqlText;
  $result=mysqli_query($link,$sql); 
  $row=mysqli_fetch_assoc($result);
}

if(isset($_POST["btnok"])){
    $order = <<<sqlcommond
    insert into orders (orderDate,customerId,customerName,productName,quantitys,orderStock,price,total,unit)
    values (
        '{$_POST["o_date"]}', 
        '{$_POST["customerId"]}',
        '{$_POST["customername"]}',
        '{$_POST["productName"]}',
        '{$_POST["quantitys"]}',
        '{$_POST["quantitys"]}',
        '{$_POST["price"]}',
        '{$_POST["total"]}',
        '{$_POST["unit"]}'
      )
    sqlcommond;
    $consequence=mysqli_query($link,$order); 
    }
    // var_dump($consequence);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="neworder.css">
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
            <h3>新增訂單</h3>
            <input type="submit" name="btnok" id="btnok" value="新增" />      
            <input type="submit" name="btnReset" id="btnReset" value="取消" />      
            
            

            <label for="customerid">客戶編號:</label>
            <input class="customersquare" type="text" id="customerId" name="customerId" value="<?php if(isset($row['customerId']))echo $row['customerId'];?>"> &emsp;&emsp;&nbsp;
            <input type="submit" name="btnSelect" id="btnSelect" value="選取" />

           
            <label for="customername">客戶名稱:</label>
            <input class="Square" type="text" id="customername" name="customername" value="<?php if(isset($row['customerName']))echo$row['customerName'];?>" > 


            <label for="phone">連絡電話:</label>     
            <input class="Square" type="text" id="phone" name="phone" value=" <?php if(isset($row["phone"]))echo $row["phone"];?>" ><br> 

            <label for="address">聯絡地址:</label>
            <input class="Square" type="text" id="address" name="address" value="<?php if(isset($row["address"]))echo$row["address"];?>"> 


            <label for="comp_name">公司抬頭:</label>
            <input class="Square" type="text" id="comp_name" name="comp_name" value="<?php if(isset($row["headline"])) echo$row["headline"];?>"> 


            <label for="comp_number">統一編號:</label>
            <input class="Square" type="text" id="comp_number" name="comp_number" value="<?php if(isset($row["uniformNumber"])) echo$row["uniformNumber"];?>"><br>

            <label for="window">聯絡窗口:</label> 
            <input class="Square" type="text" id="window" name="window" value="<?php if(isset($row["contactPerson"])) echo$row["contactPerson"];?>">

            <label for="windowphone">窗口電話:</label> 
            <input class="Square" type="text" id="windowphone" name="windowphone" value="<?php if(isset($row["extension"] )) echo$row["extension"] ;?>"> 

            <label for="sales">負責業務:</label>
            <input class="Square" type="text" id="sales" name="sales" value="<?php if(isset($row["sales"] )) echo$row["sales"];?>"><br>
            
            

         
         <table>
         <tr>
                    <td class="firstrow">訂單日期</td>
                    <td class="firstrow">品名</td>
                    <td class="firstrow">數量</td>
                    <td class="firstrow">單位</td>
                    <td class="firstrow">單價</td>
                    <td class="firstrow">金額</td>
                    
                </tr>
                <tr>
                   <td>
                   <input  class="Square" type="date" id="o_date" name="o_date">
                   </td>
                   <td> <select id="productName" name="productName">
                   <option value="紅豆">紅豆</option>
                   <option value="綠豆" >綠豆</option>
                   <option value="燕麥粒">燕麥粒</option>
                   <option value="蕎麥">蕎麥</option>
                   
                   </select></td>
                   <td><input class="insert" type="text" id="quantitys" name="quantitys" value=""></td>
                   <td><input class="weight" type="text" id="unit" name="unit" value="台斤" readonly></td>
                   <td><input class="insert" type="text" id="price" name="price" value=""></td>
                   <td><input class="insert" type="text" id="total" name="total" value=""></td>
                   
               </tr>
               
              
                
                
                
            </table>  
             </form>
      
  
      

         
          
               

    </div>
   
        

</body>

</html>