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
    <h1>Drupal BE Beetroot Academy!</h1>
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
            <form name="todoform" class="todoForm">
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control text" id="text" name="text">
                    <button class="btn btn-outline-secondary add" id="add" name="add">Add Task</button>
                </div>
            </form>

          <?php if (!empty($tasks)): ?>
              <table class="table caption-top">
                  <caption>List of tasks - <span style="color: black"><b><?=$_SESSION['login']?></b></span></caption>
                  <thead>
                  <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Task</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($tasks as $task): ?>
                      <tr>
                          <th scope="row"><?= $task['id'] ?></th>
                          <td><?= $task['text'] ?></td>
                          <td><?= $task['dt_create'] ?></td>
                          <td><a class="deltask" href="model/deleteTask.php?id=<?= $task['id'] ?>">Delete</a></td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
              <button type="button" class="btn btn-danger deltasks"><a href="model/deleteAllTasks.php">Delete all
                      tasks</a></button>
          <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('.todoForm').on("submit", function (e) {
        e.preventDefault();
        let text = document.querySelector('#text').value;
        $.ajax({
            url: 'model/addTask.php',
            type: 'POST',
            data: {
                text: text
            },
            dataType: "text"
        });
    });
</script>
</body>
</html>