<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/darkly/bootstrap.min.css" rel="stylesheet"> -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Project name</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <?php
                    if(isset($_SESSION['auth'])) {
                        echo '<a href="index.php?page=users.logout"><i class="fa fa-sign-out"></i> Se deconnecter</a>';
                    }
                    else{
                        echo '<a href="index.php?page=users.login"><i class="fa fa-user"></i> Se connecter</a>';
                    }
                ?>
            </li>
            <?php
                if(isset($_SESSION['auth'])) {
                    echo '<li><a href="index.php?page=admin.posts.index"><i class="fa fa-cog"></i> Administration</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>

<div class="container">

    <div class="starter-template" style="padding-top: 100px">
        <?= $content; ?>
    </div>

</div><!-- /.container -->
</body>
</html>