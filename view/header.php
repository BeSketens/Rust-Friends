<?php
date_default_timezone_set('Europe/Brussels');
session_start();

$connected = isset($_SESSION['connected']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<link rel="shortcut icon" href="../../design/images/favicon.ico" type="image/x-icon">-->
    <link rel="stylesheet" href="view/css/style.css">
    <title><?= $title ?></title>
</head>

<body>

<header>
    <div>
        <a href="home"><h1>Rust Friends</h1></a>
        <img alt="" src="">
    </div>
    <nav>
        <?php if ($connected) { ?>
            <a href="profile">My profile</a>
            <a href="logout">Logout</a>
        <?php } else { ?>
            <a href="create-account">Create an account</a>
        <?php } ?>
    </nav>
</header>
