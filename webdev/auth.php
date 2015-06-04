<!DOCTYPE html>
<html>
<head>
	<title>Authentication</title>
</head>
<body>
	<form action="auth.php" method="get">
		Username:
		<input type="text" name="user"><br>
		Password:
		<input type="password" name="pass"><br>
		<button type="submit" name="log">Login</button>
	</form>
	<?php
		$user = rtrim($_GET['user'], '%09%09');
		$pass = rtrim($_GET['pass'], '%09%09');

		$db = new SQLite3("../res/login.db");

		$db -> exec('CREATE TABLE IF NOT EXISTS data(user TEXT, pass TEXT, PRIMARY KEY (pri));');
		$result = $db->query('SELECT * FROM data where user="' . $user . '"');
			while ($row = $result->fetchArray())
				if ($row["pass"] == $pass) {
					$_SESSION['user'] = $user;
					header("Location: messageboard.php");
					exit();
				}

	?>

</body>
</html>