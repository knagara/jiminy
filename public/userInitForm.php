<!DOCTYPE html>

<!--
	このページはDatabaseにデータを入れるためのダミーページです
	確認用なので、最終的には使いません	
-->

<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Form</title>
		<meta name="description" content="" />
		<meta name="author" content="永良 慶太" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	</head>

	<body>
		<div>
			<header>
				<h1>userInitForm</h1>
			</header>
			<div>
				<form action="userInit.php" method="post">
					userName: <input type="text" name="userName"></input><br>
					age: <input type="text" name="age"></input><br>
					sex: <input type="text" name="sex"></input><br>
					<input type="submit" name="submit"></input><br>
				</form>
			</div>
			
			<br /><br />
			<a href="./">何も追加せず戻る</a>

			<footer>
			</footer>
		</div>
	</body>
</html>