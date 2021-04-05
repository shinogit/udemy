<?php

// 関数を取り込む
require_once(__DIR__.'/_parts/_functions.php');
// DB接続
require_once(__DIR__.'/_parts/_dbconnect.php');

// SQLのクエリ
$memo = filter_input(INPUT_POST, 'memo');
try {
  $sql = "INSERT  INTO memos SET memo = :memo";
  $stmt = $dbh->prepare($sql);
  $stmt->execute([':memo' => $memo]);
  echo "${memo}が登録された";
  header('Location:' . SITE_URL . '/index.php');
  exit();
} catch (PDOException $e) {
  exit($e->getMessage());
}

// タブに表示されるタイトルはここに書く
$title = 'input_do.phpファイル';
// HTMLのヘッダーを呼び出す
include(__DIR__.'/_parts/_header.php');
?>





<a href="db_reset.php">DBをリセットする</a>

<?php
// HTMLのフッターを呼び出す
include(__DIR__.'/_parts/_footer.php');