<?php
session_start();
require_once("classes/flash.class.php");
require_once("classes/auth.class.php");
require_once("classes/database.class.php");

$flash = new Flash();
$auth = new Auth();
$database = new Database();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="vendor/components/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-database"></i> Login Example</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <?php if (!$auth->user()) { ?>
                        <a class="nav-link" href="/?page=login"><i class="fas fa-sign-in-alt"></i> Login</a>
                        <?php } else { ?>
                        <a class="nav-link" href="/processor.php?action=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        <?php } ?>
                    </li>
                    <?php if(!$auth->user()){ ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="/?page=register"><i class="fas fa-user-plus"></i> Sign up</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav> 