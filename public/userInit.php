<?
header("Content-type: text/html; charset=UTF-8");
?>
<?php

//データベース接続
include("db_connect.class.php");
$con = new db_connect();
$dbconn = $con->jiminy_connect();

//テーブル選択
$table  = 'userInfo';




/* POSTを受け取ってデータベースに保存 */

//POST受け取り確認
if (isset($_POST["age"]))
{
	//$userID = $_POST["userID"];
	//$accessToken = $_POST["accessToken"];
	
	/* userIDとaccessTokenの照合 */
	/*
	include("php/accessCheck.class.php");
	$objCheck = new accessCheck();
	$accessResult = $objCheck->check($userID,$accessToken);
	 */
	 
	 $age = $_POST["age"];
	 $sex = $_POST["sex"];
	 $userName = htmlspecialchars($_POST["userName"]);
	 
	 //accessToken生成
	 //乱数
	 $random = mt_rand();
	 //現在時刻ミリ秒
	 $time = time();
	 //ハッシュする値
	 $unique = $random+$time;
	 //Token生成
	 $accessToken = hash("sha256",$unique);
	 
	 /* データベースにセット */
	
	$sql = "INSERT INTO $table (userName, age, sex, accessToken,setDate) VALUES (\"$userName\",$age,$sex,\"$accessToken\",now())";
	$result_flag = mysql_query($sql);

	if (!$result_flag) {
	    echo 'false';
	}
	
	
	//$res = pg_query_params($dbconn,'INSERT INTO $1 (userName, age, sex, accessToken,setDate) VALUES ($2,$3,$4,$5,now())',array($table,"ええ",$age,$sex,$accessToken));
	
	/* userIDとaccessToken をJSONで返す*/
	include("php/mysql2json.class.php"); //JSON整形してくれるクラスファイルinclude
	$result = mysql_query("select userID,accessToken from $table where accessToken = \"$accessToken\"");
	$num = mysql_affected_rows();
	$objJSON = new mysql2json();
	print(trim($objJSON->getJSON($result,$num)));
}
else 
{
	echo 'false';	
	
	//デバッグ用
	/*
	 //accessToken生成
	 //乱数
	 $random = mt_rand();
	 //現在時刻ミリ秒
	 $time = time();
	 //ハッシュする値
	 $unique = $random+$time;
	 //Token生成
	 $accessToken = hash("sha256",$unique);
	 
	 echo '<br>';
	 echo $random;
	 echo '<br>';
	 echo $time;
	 echo '<br>';
	 echo $unique;
	 echo '<br>';
	 echo $accessToken;
	 echo '<br>';
	 */
	 
}


?>