<?php

// 関数を取り込む
require_once(__DIR__.'/_parts/_functions.php');
// DB接続
require_once(__DIR__.'/_parts/_dbconnect.php');

$memo = filter_input(INPUT_POST, 'memo');
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

// SQLのクエリ
try {
  $sql = "UPDATE  memos SET memo = :memo WHERE id = :id";
  $stmt = $dbh->prepare($sql);
  $stmt->execute([':memo' => $memo, ':id' => $id]);

  // header('Location:' . SITE_URL . '/index.php');
  // exit();
} catch (PDOException $e) {
  exit($e->getMessage());
}

// タブに表示されるタイトルはここに書く
$title = 'update_do.phpファイル';
// HTMLのヘッダーを呼び出す
include(__DIR__.'/_parts/_header.php');
?>
<p>メモの内容を変更しました</p>
<p><a href="index.php">戻る</a></p>

<?php
// HTMLのフッターを呼び出す
include(__DIR__.'/_parts/_footer.php');