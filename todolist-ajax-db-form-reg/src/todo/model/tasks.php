<?php

require_once 'db.php';

function getAllTasks($id_user)
{
  $db = dbConnect();
  $sql = "SELECT * FROM tasks WHERE id_user=:id_user ORDER BY id DESC";
  $query = $db->prepare($sql);
  $query->bindParam(':id_user', $id_user);
  $query->execute();

  return $query->fetchAll();
}