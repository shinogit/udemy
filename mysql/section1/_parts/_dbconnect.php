<?php

$dsn = 'mysql:host=ip-10-0-10-57.ap-northeast-1.compute.internal;dbname=mydb;charaset=utf8';
$user = 'nagisa';
$password = '';

try {
    /* リクエストから得たスーパーグローバル変数をチェックするなどの処理 */

    // データベースに接続
    $dbh = new PDO(
        $dsn,
        $user,
        $password,
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
      ]
    );
} catch (PDOException $e) {
    exit($e->getMessage());
}