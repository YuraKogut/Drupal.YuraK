<?php

session_start();
session_destroy();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../main-style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="main-h">Welcome to AUTHORIZATION</h1>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">

        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal" action="model/authAction.php" method="post">
                <span class="heading">AUTHORIZATION</span>
                <small style="color: red;"><i><?=$_SESSION['error']; ?></i></small> <br>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" placeholder="Login" name="login">
                    <i class="fa fa-user"></i>
                </div>
                <div class="form-group help">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                    <i class="fa fa-lock"></i>
                </div>
                <div class="form-group">
                    <span class="text"><a href="reg.php">Registration</a></span>
                    <button type="submit" class="btn btn-default">Send</button>
                </div>
            </form>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->
</body>
</html>