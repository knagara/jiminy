<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="description" content="Androidゲームアプリ「窮屈な人生」 - あなたの窮屈な人生をゲームにしました。理不尽に見えますが、発想を転換するとクリアできる知恵の輪のようなゲームです。">
<meta name="keywords" content="Android,Androidアプリ,Androidゲーム,Androidゲームアプリ,アプリ,窮屈な人生,知恵の輪,永良,永良慶太,ながらけいた,Keita Nagara">
<title>Secret Stage 2 Password | 窮屈な人生 Androidゲームアプリ | クックソニア</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/hint.css">

<script src='http://a.adimg.net/javascripts/AdLantisLoader.js' type='text/javascript' charset='utf-8'></script>
<!-- AdStir
<script type="text/javascript">
var adstir_vars = {
  app_id : "MEDIA-7c76f8ad",
  ad     : "adstirtag1",
};
</script>
<script type="text/javascript" src="http://js.ad-stir.com/js/adstir.js?2011112201"></script>
AdStir END -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script src="js/jCarousel.js" type="text/javascript"></script>
<script type="text/javascript">
function doScroll(){
 if(window.pageYOffset === 0){
  window.scrollTo(0,1);
 }
}
window.onload = function(){
 setTimeout(doScroll, 100);
}

$(function(){








});
</script>
<meta name="format-detection" content="telephone=no">
</head>



<body>

<?php
//初期設定
mb_language("japanese");
mb_internal_encoding("UTF-8");
//DB接続
require_once '/home/cooksonia/db.php';
$con = mysql_connect($dsn['host'],$dsn['user'],$dsn['pass']) or die('Could not connt: ' . mysql_error());
$database  = $dsn['database'];
mysql_select_db($database, $con) or die('Could not select database');
$table  = $dsn['rank1_t_fix'];

?>

<h2 style="font-size:150%;font-weight:bold;background:#550102;color:#fff;">隠しステージ１　スコアランキング</h2>

<div id="wrap">
	<form action="ranking1_fix.php" method="post">
		<input type="text" name="score"></input><br>
		<input type="text" name="name"></input><br>
		<input type="text" name="comment"></input><br>
		<input type="submit" name="submit_morika"></input><br>
	</form>
</div>
<footer>
  <br>
  <p><a href="index.html">トップヘ戻る</a></p>
  <br>
  <p><a href="../">PCサイト</a>　|　スマートフォンサイト</p>
</footer>
</body>
</html>