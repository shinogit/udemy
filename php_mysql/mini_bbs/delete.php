<?php
session_start();
require_once(__DIR__ . '/dbconnect.php');

if (isset($_SESSION['id'])) {
  $id = $_GET['id'];

  $messages = $db->prepare("SELECT * FROM posts WHERE id=?");
  $messages->execute([$id]);
  $message = $messages->fetch();

  if ($message['member_id'] === $_SESSION['id']) {
    $del = $db->prepare("DELETE FROM posts WHERE id=?");
    $del->execute([$id]);
  }

}

header('Location: index.php');