<?php

// 関数を取り込む
require_once(__DIR__ . '/_parts/_functions.php');
// DB接続
require_once(__DIR__ . '/_parts/_dbconnect.php');

$id = $_GET['id'] ?? null;
// 整数以外が直接クエリパラメータに入力されたら実行
if (!is_numeric($id) || $id <= 0) {
  exit('1以上の数字で入力してください');
}

// SQLのクエリ
try {
  $sql = "SELECT * FROM memos WHERE id = :id";

  $memos = $dbh->prepare($sql);
  $memos->execute([':id' => $id]);
  $memo = $memos->fetch();
} catch (PDOException $e) {
  exit($e->getMessage());
}

// タブに表示されるタイトルはここに書く
$title = 'inpit_do.phpファイル';
// HTMLのヘッダーを呼び出す
include(__DIR__ . '/_parts/_header.php');
?>

<article>
  <?= $memo['memo']; ?>
  <p>
    <a href="update.php?id=<?= $memo['id']; ?>">編集する</a>
    |
    <a href="delete.php?id=<?= $memo['id']; ?>">削除する</a>
  </p>
  <p><a href="index.php">戻る</a></p>
</article>

<?php
// HTMLのフッターを呼び出す
include(__DIR__ . '/_parts/_footer.php');
