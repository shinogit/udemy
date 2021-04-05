<?php

// 関数を取り込む
require_once(__DIR__.'/_parts/_functions.php');
// DB接続
require_once(__DIR__.'/_parts/_dbconnect.php');

define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/udemy/mysql');

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if(!empty($id) && is_int($id)) {

  // SQLのクエリ
try {
  $sql = "DELETE FROM memos WHERE id = :id";
  $stmt = $dbh->prepare($sql);
  $stmt->execute([':id' => $id]);

  // header('Location:' . SITE_URL . '/index.php');
  // exit();
} catch (PDOException $e) {
  exit($e->getMessage());
}

}


// タブに表示されるタイトルはここに書く
$title = 'delete.phpファイル';
// HTMLのヘッダーを呼び出す
include(__DIR__.'/_parts/_header.php');
?>
<p>メモの内容を削除しました</p>
<p><a href="index.php">戻る</a></p>

<?php
// HTMLのフッターを呼び出す
include(__DIR__.'/_parts/_footer.php');