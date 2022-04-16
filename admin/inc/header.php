<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
if (!isset($_COOKIE["PHPADLGADP"])) {
    header("location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/datatables-select.min.css">
</head>

<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                        <li class="nav-item mt-3">ADMIN</li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item"><a href="/" class="btn btn-sm btn-success mx-2">Visit Site</a></li>
                        <li class="nav-item"><a href="inbox.php" class="btn btn-sm btn-info mx-2">Inbox</a></li>
                        <li class="nav-item"><a href="changepassword.php" class="btn btn-sm btn-warning mx-2">change Password</a></li>
                        <li class="nav-item"><a href="logout.php" class="btn btn-sm btn-danger">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php include("sidebar.php"); ?>
        <div class="page-wrapper">
            <div class="container-fluid">