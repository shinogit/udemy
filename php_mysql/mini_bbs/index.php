<?php
session_start();
require_once(__DIR__ . '/dbconnect.php');

if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
  $_SESSION['time'] = time();
  $members = $db->prepare("SELECT * FROM members WHERE id=?");
  $members->execute([$_SESSION['id']]);
  $member = $members->fetch();
} else {
  header('Location: login.php');
  exit();
}
// 投稿ボタンがクリックされたとき
if (!empty($_POST)) {
  if ($_POST['message'] !== '') {
    // 空文字の場合は0にする
    if ($_POST['reply_post_id'] === '') {
      $_POST['reply_post_id'] = 0;
  }
    $message = $db->prepare("INSERT INTO posts SET member_id=?, message=?, reply_message_id=?");
    $message->execute([$member['id'], $_POST['message'], $_POST['reply_post_id']]);
  }
  // 再読み込みして再度投稿されてしまうのを防ぐ
  header('Location: index.php');
  exit();
}

// 投稿を取得
$page = $_GET['page'];
if ($page === '') {
  $page = 1;
}
$page = max($page, 1);

$counts = $db->query("SELECT COUNT(*) AS cnt FROM posts");
$cnt = $counts->fetch();
$maxPage = ceil($cnt['cnt'] / 5);
$page = min($page, $maxPage);

$start = ($page - 1) * 5;
$posts = $db->prepare("SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created_at DESC LIMIT ?, 5");
$posts->bindParam(1, $start, PDO::PARAM_INT);
$posts->execute();

// Reがクリックされたとき
if (isset($_REQUEST['res'])) {
  // 返信の処理
  $response = $db->prepare("SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id AND p.id=?");
  $response->execute([$_REQUEST['res']]);

  $table = $response->fetch();
  $message = '@' . $table['name'] . ' ' . $table['message'];
}
?>




<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ひとこと掲示板</title>

  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="wrap">
    <div id="head">
      <h1>ひとこと掲示板</h1>
    </div>
    <div id="content">
      <div style="text-align: right"><a href="logout.php">ログアウト</a></div>
      <form action="" method="post">
        <dl>
          <dt><?= htmlspecialchars($member['name'], ENT_QUOTES); ?>さん、メッセージをどうぞ</dt>
          <dd>
            <textarea name="message" cols="50" rows="5"><?= htmlspecialchars($message, ENT_QUOTES); ?></textarea>
            <input type="hidden" name="reply_post_id" value="<?= htmlspecialchars($_REQUEST['res'], ENT_QUOTES); ?>" />
          </dd>
        </dl>
        <div>
          <p>
            <input type="submit" value="投稿する" />
          </p>
        </div>
      </form>

      <?php foreach ($posts as $post) : ?>
        <div class="msg">
          <img src="member_picture/<?= htmlspecialchars($post['picture'], ENT_QUOTES); ?>" width="48" height="48" alt="<?= htmlspecialchars($post['name'], ENT_QUOTES); ?>" />
          <p><?= htmlspecialchars($post['message'], ENT_QUOTES); ?><span class="name">（<?= htmlspecialchars($post['name'], ENT_QUOTES); ?>）</span>[<a href="index.php?res=<?= htmlspecialchars($post['id'], ENT_QUOTES); ?>">Re</a>]</p>
          <p class="day"><a href="view.php?id=<?= htmlspecialchars($post['id'], ENT_QUOTES); ?>"><?= htmlspecialchars($post['created_at'], ENT_QUOTES); ?></a>
            <?php if ($post['reply_message_id'] > 0) : ?>
              <a href="view.php?id=<?= htmlspecialchars($post['reply_message_id'], ENT_QUOTES); ?>">返信元のメッセージ</a>
            <?php endif; ?>
            <?php if ($_SESSION['id'] === $post['member_id']) : ?>
            [<a href="delete.php?id=<?= htmlspecialchars($post['id'], ENT_QUOTES); ?>" style="color: #F33;">削除</a>]
            <?php endif; ?>
          </p>
        </div>
      <?php endforeach; ?>

      <ul class="paging">
        <?php if ($page > 1):?>
        <li><a href="index.php?page=<?= htmlspecialchars(($page - 1), ENT_QUOTES); ?>">前のページへ</a></li>
        <?php endif;?>
        <?php if ($page < $maxPage):?>
        <li><a href="index.php?page=<?= htmlspecialchars(($page + 1), ENT_QUOTES); ?>">次のページへ</a></li>
        <?php endif;?>
      </ul>
    </div>
  </div>
</body>

</html>