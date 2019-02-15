<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try {
  // DBに接続する
  $dbh = new PDO($dsn, $user, $pass);

  // ここでクエリ実行する
  // queryメソッド(SELECT)
  $query_result = $dbh->query('SELECT * FROM test_comments');

  // prepareメソッド(INSERT)
  $sth = $dbh->prepare('INSERT INTO test_comments (name, text) VALUES (?, ?)');

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}
?>

<?php
  foreach($query_result as $row) {
    print $row["name"] . ": " . $row["text"] . "<br/>";
  }
?>

<?php
  $name = "John";
  $text = "Power to the People";
  $sth->execute(array($name, $text));
?>
