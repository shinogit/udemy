<?php
try {
  $db = new PDO('mysql:host=ip-10-0-10-57.ap-northeast-1.compute.internal;dbname=mini_bbs;charaset=utf8', 'nagisa', '');
} catch(PDOException $e) {
  echo ('DB接続エラー: ' . $e->getMessage());
}