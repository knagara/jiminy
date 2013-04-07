<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>

<body>

<?php
//初期設定
mb_language("japanese");
mb_internal_encoding("UTF-8");
//DB接続
//require_once '/home/cooksonia/db.php'; Apacheの設定
require_once '../db.php';
$con = mysql_connect($dsn['host'],$dsn['user'],$dsn['pass']) or die('サーバに接続できませんでした。しばらくしてから再度お試し下さい。: ' . mysql_error());
$database  = $dsn['database'];
mysql_select_db($database, $con) or die('データベースに接続できませんでした。しばらくしてから再度お試し下さい。: ');
$table  = $dsn['category'];

//MySQLのクライアントの文字コードをutf8,sjisに設定
//mysql_query("SET NAMES sjis")
//or die("can not SET NAMES sjis");
//mysql_set_charset('ujis');


//POST受け取り確認
if (isset($_POST["submit_5578"])) //セキュリティに難あり要修正 submitの値をパスワードに利用 ネイティブアプリからはわからない
{ 
	$name = htmlspecialchars($_POST["name"]);
	$userId = $_POST["userId"];
	$sql = "INSERT INTO $table (name, userId) VALUES (\"$name\",$userId)";
	$result_flag = mysql_query($sql);

	if (!$result_flag) {
	    echo '<br>カテゴリー登録に失敗しました。: ' . mysql_error();
		echo '<br><br>';
	}

}

?>
<header id="top">
<h2>カテゴリー一覧</h2>
</header>
<div id="wrap">
	<table>
		<tr id="tr_top"><td class="t_id">id</td><td class="t_name">name</td><td class="t_userId">userId</td></tr>

<!-- ここからPHPでデータベースに接続、結果を表示 -->
<?php
//$rank=1;
$result = mysql_query("select * from $table order by id asc");
while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	echo "<tr><td class=\"t_id\">".$row["id"]."</td><td class=\"t_name\">".$row["name"]."</td><td class=\"t_userId\">".$row["userId"]."</td></tr>\n";
	//$rank++;
} 
?>
<!-- ここまで -->

	</table>
  <br></div>

</body>
</html>