<?php

/**
 * Connection to db. Setting the encoding
 * @return PDO
 */
function dbConnect(): PDO
{
  static $db;

  if ($db === null) {
    $db = new PDO('mysql:host=db;dbname=todo', 'admin', 'pass12345', [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $db->exec('SET NAMES UTF8');
  }
  return $db;
}