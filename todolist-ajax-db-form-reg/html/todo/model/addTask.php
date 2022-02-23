<?php

require_once 'db.php';
require_once 'tasks.php';

session_start();

$db = dbConnect();


if (!empty($_POST)) {
  $id = (int)$_SESSION['id'];
  $text = trim($_POST['text']);

  if (!empty($text)) {
    $sql = "INSERT iNTO tasks (id_user, text) VALUES (:id_user, :text)";
    $query = $db->prepare($sql);
    $query->bindParam(':text', $text);
    $query->bindParam(':id_user', $id);
    $query->execute();
    $tasks = getAllTasks($_SESSION['id']);
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 'XMLHttpRequest' == $_SERVER['HTTP_X_REQUESTED_WITH']){
      print json_encode($tasks);
      exit();
    }
//    return $result->fetchAll();
    header("Location: ../todo.php");
  } else {
    header('Location: ../todo.php');
  }
} else {
  header('Location: ../todo.php');
}
 exit();
