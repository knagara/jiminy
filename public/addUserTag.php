<?php
header("Content-type: text/html; charset=UTF-8");
?>
<?php

//データベース接続
include("db_connect.class.php");
$con = new db_connect();
$con->jiminy_connect();

//テーブル選択
$table  = 'userTag';



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
		$tagID = mysql_real_escape_string($_POST["tagID"]);
		$tagComment = mysql_real_escape_string(htmlspecialchars($_POST["tagComment"]));
		
		//既に登録されているか確認
		$result = mysql_query("select userID,tagID from $table where userID = $userID and tagID=$tagID");
		if(mysql_num_rows($result)>0){
			//既に登録されている場合
			//tagFlagが0ならそれを1にする
			//tagFlagが0かどうか確認
			$result = mysql_query("select tagFlag from $table where userID = $userID and tagID = $tagID");
			$row = mysql_fetch_array($result,MYSQL_ASSOC);
			$flag = $row["tagFlag"];
			if($flag==0){
				$result = mysql_query("UPDATE $table SET tagFlag=1 WHERE userID = $userID and tagID = $tagID");
				if($result){
					echo 'true';
				}else{
					echo 'false';
				}
			}else{
				//tagFlag=1の場合　失敗
				echo'false';	
			}
		}else{
			//タグが登録されてなかった場合、タグを登録
			$sql = "INSERT INTO $table (userID,tagID,tagComment) VALUES ($userID,$tagID,\"$tagComment\")";
			$result_flag = mysql_query($sql);
			if (!$result_flag) {
			    echo 'false';
			}else{
				echo 'true';
			}
		}
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