<?php
// 関数を取り込む
require_once(__DIR__ . '/_parts/_functions.php');
// DB接続
require_once(__DIR__ . '/_parts/_dbconnect.php');

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if(!empty($id) && is_int($id)) {

  try {
    $sql = "SELECT * FROM memos WHERE id = :id";
    $memos = $dbh->prepare($sql);
    $memos->execute([':id' => $id]);
    $memo = $memos->fetch();
  } catch (PDOException $e) {
    exit($e->getMessage());
  }

}


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PHPの勉強</title>

</head>

<body>
  <form action="update_do.php" method="POST">
    <input type="hidden" name="id" value="<?= $id; ?>">
  <textarea name="memo" cols="50" rows="10"><?= ($memo['memo']);?></textarea><br>
  <button>登録する</button>
</form>
</body>

</html>