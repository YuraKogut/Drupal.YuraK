<?php

require_once 'db.php';

session_start();

$_SESSION['error'] = "";

$db = dbConnect();

if (!empty($_POST)) {
  $id = (int)$_POST['id'];
  $login = trim(stripcslashes(htmlspecialchars($_POST['login'])));
  $email = trim(stripcslashes(htmlspecialchars($_POST['email'])));
  $password = sha1(trim(($_POST['password'])));

  if (LoginEmailCheck($login, $email)) {
    $_SESSION['error'] = "Email or Login already exists";
    header("Location: ../reg.php");
  } else {
    $sql = "INSERT users (login, email, password) VALUES (:login, :email, :password)";
    $query = $db->prepare($sql);
    $query->bindParam(':login', $login, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    header("Location: ../auth.php");
  }
  exit();
} else {
  header("Location: ../reg.php");
}
exit();

/**
 * Checking for the existence of login and email in the database
 * @param $login
 * @param $email
 * @return mixed
 */
function LoginEmailCheck ($login, $email)
{
  $db = dbConnect();

  $result = $db->prepare('SELECT COUNT(*) as COUNT FROM `users` WHERE `login` = ? OR `email` = ?');
  $result ->execute(array($login, $email));
  $result = $result ->fetch(PDO::FETCH_ASSOC);

  return $result['COUNT'];
}