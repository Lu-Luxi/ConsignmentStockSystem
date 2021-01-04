<?php
$errorMessage="";
if(isset($_POST["btnOK"])){
  if($_POST["account"]!=""){
    $_SESSION["userName"]=$_POST["account"];
  header("location:enter.php");
  }
  else{$errorMessage=" 請輸入員工編號";

  }
  
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<form class="signin" method="post" action="">
<h2>登入系統</h2><br><br><br>
<label class="fontstyle" for="account">員工編號：</label>
<input type="text" id="account" name="account"><br><br><br>

<label class="fontstyle" for="code">登入密碼：</label>
<input type="password" id="code" name="code"><br><br><br>

<input type="submit" name="btnOK" id="btnOK" value="登入" />
<input type="reset" name="btnReset" id="btnReset" value="重設" />
</form>    
</body>
</html>