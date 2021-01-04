<?php
require("dbConnection.php");

if (isset($_POST["btnOK"])) {
    $sql = <<<sqlCommand
      update customer set 
      customerName ='{$_POST["customerName"]}',
      phone = '{$_POST["phone"]}',
      address = '{$_POST["address"]}',
      contactPerson = '{$_POST["contactPerson"]}',
      extension = '{$_POST["extension"]}',
      sales = '{$_POST["sales"]}',
      uniformNumber = '{$_POST["uniformNumber"]}',
      headline = '{$_POST["headline"]}'
    where  customerId = {$_POST["customerId"]}
   sqlCommand;
   
    mysqli_query($link, $sql);
    
    header("location:customers.php");
    exit();
  }

$id = $_GET["id"];
$sql = <<<sqlText
select * from customer where customerId = $id
sqlText;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
// var_dump($row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addcustomer.css">
</head>
<body>

<form class="signin" method="post" action="">

<h2>修改客戶資料</h2><br><br><br>
<input type="hidden" name="customerId" value="<?= $row["customerId"] ?>">

<label class="fontstyle" for="customerId">客戶編號</label>
<input type="text" id="customerId" name="customerId" value="<?= $row["customerId"] ?>" type="text" placeholder=""> 
            
<label class="fontstyle" for="customerName">客戶名稱:</label>
<input type="text" id="customerName" name="customerName" value="<?= $row["customerName"] ?>" type="text" placeholder=""> 


<label class="fontstyle" for="phone">連絡電話:</label>
<input type="text" id="phone" name="phone" value="<?= $row["phone"] ?>" type="text" placeholder=""><br><br>

<label class="fontstyle" for="address">聯絡地址:</label>
<input type="text" id="address" name="address" value="<?= $row["address"] ?>" type="text" placeholder=""> 


<label class="fontstyle" class="fontstyle" for="headline">公司抬頭:</label>
<input type="text" id="headline" name="headline" value="<?= $row["headline"] ?>" type="text" placeholder=""> 


<label class="fontstyle" for="uniformNumber">統一編號:</label>
<input type="text" id="uniformNumber" name="uniformNumber" value="<?= $row["uniformNumber"] ?>" type="text" placeholder=""><br><br>

<label class="fontstyle" for="contactPerson">聯絡窗口:</label>
<input type="text" id="contactPerson" name="contactPerson" value="<?= $row["contactPerson"] ?>" type="text" placeholder="">

<label class="fontstyle" for="extension">窗口電話:</label>
<input type="text" id="extension" name="extension" value="<?= $row["extension"] ?>" type="text" placeholder=""> 

<label class="fontstyle" for="sales">負責業務:</label>
<input type="text" id="sales" name="sales" value="<?= $row["sales"] ?>" type="text" placeholder=""><br><br>


<input class="fontstyle" type="submit" name="btnOK" id="btnOK" value="修改" />
<!-- <input type="reset" name="btnReset" id="btnReset" value="重設" /> -->
</form>    
</body>
</html>