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
$con = mysql_connect('localhost','root','root') or die('サーバに接続できませんでした。: ' . mysql_error());
mysql_query("SET NAMES utf8",$con); //クエリの文字コードを設定
$database  = 'test';
mysql_select_db($database, $con) or die('データベースに接続できませんでした。しばらくしてから再度お試し下さい。: ');
$table  = 'test'; //ここでテーブルを選択


	$sql = "INSERT INTO test (num) VALUES (999)";
	$result_flag = mysql_query($sql);

	if (!$result_flag) {
	    echo '<br>登録に失敗しました。: ' . mysql_error();
		echo '<br><br>';
	}



?>



<header id="top">
<h2>5 min</h2>
</header>
<div id="wrap">
	<table border="1">
		<tr id="tr_top"><td class="t_id">id</td><td class="t_name">num</td></tr>



<!-- ここからPHPでデータベースに接続、結果を表示 -->
<?php
//$rank=1;
$result = mysql_query("select * from $table order by id asc");
while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	echo "<tr><td class=\"t_id\">".$row["id"]."</td><td class=\"t_name\">".$row["num"]."</td></tr>\n";
	//$rank++;
} 
?>
<!-- ここまで -->



	</table>
  <br>
  <br>
</div>

</body>
</html>