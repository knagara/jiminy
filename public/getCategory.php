<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>

<body>

<h2>JSONで取得</h2>
<br />


<?php
/* データベースに接続 */

//文字コード設定
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");

//DB接続
/* セキュリティのため、非公開フォルダにdb.phpとしてデータベース接続を保存してある。 */
require_once '../db.php';
$con = mysql_connect($dsn['host'],$dsn['user'],$dsn['pass']) or die('サーバに接続できませんでした。しばらくしてから再度お試し下さい。: ' . mysql_error());
mysql_query("SET NAMES utf8",$con); //クエリの文字コードを設定
$database  = $dsn['database'];
mysql_select_db($database, $con) or die('データベースに接続できませんでした。しばらくしてから再度お試し下さい。: ');
$table  = $dsn['category']; //ここでテーブルを選択

?>

<?php

/*データベースから取得、JSON生成*/
include("php/mysql2json.class.php"); //JSON整形してくれるクラスファイルinclude
$result = mysql_query("select * from $table order by id asc");
$num = mysql_affected_rows();
$objJSON = new mysql2json();
print(trim($objJSON->getJSON($result,$num)));

?>



<br /><br /><br />

<a href="addCategory.php">→戻る</a>

</body>
</html>