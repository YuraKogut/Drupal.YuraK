<?php

require_once 'model/db.php';
require_once 'model/tasks.php';

session_start();

if (empty($_SESSION['id'])) {
  header("Location: ../authreg/auth.php");
  exit();
}

$tasks = getAllTasks($_SESSION['id']);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DrupalToDoList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        input[type="text"]:focus,
        button:focus {
            box-shadow: none !important;
            outline: none !important;
        }

        .deltasks a {
            text-decoration: none;
            color: #fff;
        }

        .deltasks a:hover {
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Hello, <?php echo $_SESSION["login"] ?></h1>
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
        <div class="col-6">
            <form name="todoform"   class="todoForm">
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control text" id="text" name="text">
                    <button class="btn btn-outline-secondary add" type="submit" id="add" name="add">Add Task</button>
                </div>
            </form>
            
        <div id="table">
          
              
            </div>
           
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/script.js"></script>
</body>
</html>