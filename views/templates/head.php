<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SpaceCAD</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="public/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/theme.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SpaceCAD</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item"><a class="nav-link" href="/"><span>Dashboard</span></a></li>
            <hr class="sidebar-divider">
            <!--<div class="sidebar-heading">Registration</div>
            <li class="nav-item"><a class="nav-link" href="#"><span>Civilian</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span>Vehicle</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span>Firearm</span></a></li>-->
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto mr-auto">
                        <li class="nav-item dropdown no-arrow"><strong><span>PO1
                                    Douglas
                                    McGee</span></strong></li>

                    </ul>
                </nav>
                <div class="container-fluid">
                    <?php
                        if (isset($_SESSION['flash_message'])) {
                            switch($_SESSION['flash_status']) {
                                case 'info':
                                    echo '<div class="alert alert-info" role="alert">';
                                    break;
                                case 'error':
                                    echo '<div class="alert alert-danger" role="alert">';
                                    break;
                                case 'success':
                                    echo '<div class="alert alert-success" role="alert">';
                                    break;
                                default:
                                    echo '<div class="alert alert-info" role="alert">';
                            }

                            echo $_SESSION['flash_message'];
                            echo "</div>";
                            FlashMessage::clearMessage();
                        }
                    ?>