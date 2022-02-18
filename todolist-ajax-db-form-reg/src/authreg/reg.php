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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../main-style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="main-h">Welcome to registration</h1>
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
            <form class="form-horizontal" action="model/regAction.php" method="post">
                <span class="heading">REGISTRATION</span>
                <small style="color: red;"><i><?= $_SESSION['error']; ?></i></small> <br>
                <small><i>At least three Latin letters</i></small>
                <div class="form-group">
                    <input type="text" class="form-control" id="login" placeholder="Login" name="login"
                           pattern="[A-Za-z]{3,}" required>
                    <i class="fa fa-user"></i>
                </div>
                <small><i>Email in the format: site@example.com</i></small>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                    <i class="fa fa-at"></i>
                </div>
                <small><i>Minimum 8 characters</i></small>
                <div class="form-group help">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                           minlength="8" required>
                    <i class="fa fa-lock"></i>
                </div>
                <div class="form-group">
                    <span class="text"><a href="auth.php">Authorization</a></span>
                    <button type="submit" class="btn btn-default">Send</button>
                </div>
            </form>

        </div>

    </div><!-- /.row -->
</div><!-- /.container -->
</body>
</html>