<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>

<body>
	

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


/* POSTを受け取ってデータベースに保存 */

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
	<table border="1">
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
  <br>
  <br>
  <a href="addCategoryForm.html">カテゴリー追加ページヘ</a>
  <br /><br />
  <a href="getCategory.php">JSONで取得するページヘ</a>
</div>

</body>
</html>