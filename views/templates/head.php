<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SpaceCAD</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="public/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/theme.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div id="header" style="text-align: center; padding-top: 15px;">
                    <h3 style="font-style:italic">Los Santos Police Department</h3>
                    <?= Home::random_slogan(); ?>
                </div>
                <hr>
                <div style="text-align: center">
                    <p><a href="/">Home</a> | <a href="/search">Search</a> | Reports | Warrants</p>
                </div>
                <hr>
                <div class="container-fluid">
                    <?php
                        if (isset($_SESSION['flash_message'])) {
                            switch($_SESSION['flash_status']) {
                                case 'info':
                                    echo '<div class="alert alert-info text-center" role="alert"><font size="6"><strong>Information</strong></font><br />';
                                    break;
                                case 'error':
                                    echo '<div class="alert alert-danger text-center" role="alert"><font size="6"><strong>Error</strong></font><br />';
                                    break;
                                case 'success':
                                    echo '<div class="alert alert-success text-center" role="alert"><font size="6"><strong>Success</strong></font><br />';
                                    break;
                                default:
                                    echo '<div class="alert alert-info text-center" role="alert"><font size="6"><strong>Information</strong></font><br />';
                            }

                            echo $_SESSION['flash_message'];
                            echo "</div>";
                            FlashMessage::clearMessage();
                        }
                    ?>