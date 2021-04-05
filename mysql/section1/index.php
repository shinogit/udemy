<?php

// 関数を取り込む
require_once(__DIR__ . '/_parts/_functions.php');
// DB接続
require_once(__DIR__ . '/_parts/_dbconnect.php');

$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
if (!empty($page) && is_int($page)) {
  $page = $page;
} else {
  $page = 1;
}
$start = 5 * ($page - 1);
// SQLのクエリ
try {
  $sql = "SELECT * FROM memos ORDER BY id DESC LIMIT :page, 5";
  $memos = $dbh->prepare($sql);
  $memos->bindParam(':page', $start, PDO::PARAM_INT);
  $memos->execute();
} catch (PDOException $e) {
  exit($e->getMessage());
}

// タブに表示されるタイトルはここに書く
$title = '一覧表示画面';
// HTMLのヘッダーを呼び出す
include(__DIR__ . '/_parts/_header.php');
?>

<article>
  <?php while ($memo = $memos->fetch()) : ?>
    <p><a href="memo.php?id=<?= h($memo['id']) ?>"><?= mb_substr(h($memo['memo']), 0, 50); ?></a></p>
    <time><?= $memo['created_at']; ?></time>
    <hr>
  <?php endwhile; ?>
  <?php if ($page >= 2) : ?>
    <a href="index.php?page=<?= ($page - 1); ?>"><?= ($page - 1); ?>ページ目へ移動</a>
  <?php endif; ?>
  |
  <?php
    $counts = $dbh->query("SELECT COUNT(*) as cnt FROM memos");
    $count = $counts->fetch();
    $max_page = ceil($count['cnt'] / 5);
  ?>
  <?php if ($page < $max_page) : ?>
    <a href="index.php?page=<?= ($page + 1); ?>"><?= ($page + 1); ?>ページ目へ移動</a>
  <?php endif; ?>
</article>
<a href="input.html">投稿する</a>

<?php
// HTMLのフッターを呼び出す
include(__DIR__ . '/_parts/_footer.php');
