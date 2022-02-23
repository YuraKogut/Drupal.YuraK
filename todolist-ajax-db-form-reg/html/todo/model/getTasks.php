<?php

require_once 'tasks.php';

session_start();

$id = (int)$_SESSION['id'];
$tasks = getAllTasks($_SESSION['id']);
print json_encode($tasks);
exit();