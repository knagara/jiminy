<?php
class access_check {

	function check($userID, $accessToken) {
		if (is_numeric($userID)) {
			$result = mysql_query("select accessToken from userInfo where userID = $userID LIMIT 1");
			$row = mysql_fetch_assoc($result);
			$getToken = $row['accessToken'];

			if (strcmp($accessToken, $getToken) == 0) {
				return 0;
				//認証成功
			} else {
				return 1;
				//エラー
			}
		} else {
			return 1;
		}
	}

}
?>