<?php
header("Content-type: text/html; charset=UTF-8");
?>
<?php

//データベース接続
include("db_connect.class.php");
$con = new db_connect();
$con->jiminy_connect();

//テーブル選択
$table  = 'tagInfo';



//POST受け取り確認
if (isset($_POST["userID"]))
{
	$userID = mysql_real_escape_string($_POST["userID"]);
	$accessToken = $_POST["accessToken"];
	
	/* userIDとaccessTokenの照合 */
	include("access_check.class.php");
	$objCheck = new access_check();
	$accessResult = $objCheck->check($userID,$accessToken);
	
	if($accessResult==0)
	{		 
		$categoryID = mysql_real_escape_string($_POST["categoryID"]);
		
		/* userIDとaccessToken をJSONで返す*/
		include("php/mysql2json.class.php"); //JSON整形してくれるクラスファイルinclude
		//$result = mysql_query("select i.tagName,i.tagID,count(u.tagID) from tagInfo as i,userTag as u where categoryID = \"$categoryID\"");
		$result = mysql_query("select tagInfo.tagID,tagInfo.tagName,count(userTag.tagID) as count from tagInfo INNER JOIN userTag ON tagInfo.tagID=userTag.tagID where categoryID = $categoryID group by tagInfo.tagID order by count desc");
		$num = mysql_affected_rows();
		$objJSON = new mysql2json();
		print(trim($objJSON->getJSON($result,$num)));
	}
	else
	{
		echo 'false';
	}
}
else 
{
	echo 'false';		 
}


?>