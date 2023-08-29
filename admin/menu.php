<?php
session_start();
if ($_SESSION['pass'] != '729465') {
    header('Location:login');
} ?>


<!DOCTYPE html>
<html>

<head>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport' />
    <link rel="stylesheet" href="../css/style.css?v=2.2" media="screen">
    <link rel="stylesheet" href="../css/base_style.css?v=3.1" media="screen">
</head>

<body>