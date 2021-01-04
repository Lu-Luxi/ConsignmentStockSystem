<?php
require("dbConnection.php");
if (isset($_POST["cancelButton"])) {
  header("Location:enter.php");
}
if (isset($_POST["btnOK"])) {
  
  $sql = <<<sqlText
    insert into customer (customerName, phone, address, contactPerson, extension, sales, uniformNumber, headline)
      values (
        '{$_POST["customername"]}', 
        '{$_POST["phone"]}',
        '{$_POST["address"]}',
        '{$_POST["contactPerson"]}',
        '{$_POST["extension"]}',
        '{$_POST["sales"]}',
        '{$_POST["uniformNumber"]}',
        '{$_POST["headline"]}'
      )
  sqlText;
  mysqli_query($link, $sql);
  header("location: customers.php");
}

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
<h2>新增客戶</h2><br><br><br>
<label class="fontstyle" for="customerid">客戶編號:</label>
<input type="text" id="customerid" name="customerid"> 
            
<label class="fontstyle" for="customername">客戶名稱:</label>
<input type="text" id="customername" name="customername"> 


<label class="fontstyle" for="phone">連絡電話:</label>
<input type="text" id="phone" name="phone"><br><br>

<label class="fontstyle" for="address">聯絡地址:</label>
<input type="text" id="address" name="address"> 


<label class="fontstyle" class="fontstyle" for="headline">公司抬頭:</label>
<input type="text" id="headline" name="headline"> 


<label class="fontstyle" for="uniformNumber">統一編號:</label>
<input type="text" id="uniformNumber" name="uniformNumber"><br><br>
<label class="fontstyle" for="contactPerson">聯絡窗口:</label>
<input type="text" id="contactPerson" name="contactPerson">

<label class="fontstyle" for="extension">窗口電話:</label>
<input type="text" id="extension" name="extension"> 

<label class="fontstyle" for="sales">負責業務:</label>
<input type="text" id="sales" name="sales"><br><br>


<input class="fontstyle" type="submit" name="btnOK" id="btnOK" value="新增" />
<input class="fontstyle" type="submit" name="cancelButton" id="cancelButton" value="取消" />
</form>    
</body>
</html>