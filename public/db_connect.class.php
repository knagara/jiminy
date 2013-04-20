<?php
class db_connect{
	
	function jiminy_connect(){
	
		/* データベースに接続 */
		
		
		//文字コード設定
		mb_language("uni");
		mb_internal_encoding("utf-8"); //内部文字コードを変更
		mb_http_input("auto");
		mb_http_output("utf-8");
		
		
		//DB接続
		//セキュリティのため、非公開フォルダにdb.phpとしてデータベース接続を保存してある。
		require_once '../db.php';
		$con = mysql_connect($dsn['host'],$dsn['user'],$dsn['pass']) or die('SQLサーバに接続できませんでした。しばらくしてから再度お試し下さい。: ' . mysql_error());
		mysql_query("SET NAMES utf8",$con); //クエリの文字コードを設定
		$database  = $dsn['database'];
		mysql_select_db($database, $con) or die('データベースを選択できませんでした。しばらくしてから再度お試し下さい。: ');
		
		
		/*
		//DB接続
		//セキュリティのため、非公開フォルダにdb.phpとしてデータベース接続を保存してある。
		require_once '../db.php';
		$dbconn = pg_connect('host='.$dsn['host'].' dbname='.$dsn['database'].' user='.$dsn['user'].' password='.$dsn['pass'].' options=\'--client_encoding=utf8\'');
	
		return $dbconn;
		*/
	}
}
?>