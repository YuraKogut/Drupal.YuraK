<?php

require_once 'db.php';

session_start();

$_SESSION['error'] = "";
$_SESSION['login'] = "";

$db = dbConnect();

if (!empty($_POST)) {
  $login = trim(stripcslashes(htmlspecialchars($_POST['login'])));
  $password = sha1(trim(($_POST['password'])));
  $_SESSION['login'] = $login;

  if (checkAuth($login, $password)) {
    header("Location: ../../todo/todo.php");
    exit();
  } else {
    $_SESSION['error'] = "Not successful!";
    header("Location: ../auth.php");
    exit();
  }
}

function checkAuth($login, $password)
{
  $users = getAllUsersFromDB();

  foreach ($users as $user) {
    if ($user['login'] === $login && $user['password'] === $password) {
      $_SESSION["id"] = $user['id_user'];
      return true;
    }
  }
  return false;
}

function getAllUsersFromDB(): array
{
  $db = dbConnect();
  $sql = "SELECT * FROM users";
  $sql = $db->prepare($sql);
  $sql->execute();

  return $sql->fetchAll();
}