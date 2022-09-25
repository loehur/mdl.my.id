<?php 
    session_start();
    if ($_SESSION['pass'] != '729465'){
    header('Location:../login');
}?>

<!DOCTYPE html>
<html>
<head>
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<link rel="stylesheet" href="../../css/style.css?v=3" media="screen">
<link rel="stylesheet" href="../../css/base_style.css?v=3" media="screen">
<link rel="icon" href="icon/icon.png" type="image/gif">
<title>MDL Coin</title>
</head>

<body>
<div class="mt-1 konten w-100">
    <table class="w-100">
    <tr>
    <td><a href="index.php"><button class="btn-menu">Akun</button></a></td>
    <td><a href="v_coin_add.php"><button class="btn-menu">Coin</button></a></td>
    </tr>
    </table>
</div>