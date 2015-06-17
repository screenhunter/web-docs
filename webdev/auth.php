<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<link href="../css/mb.css" rel="stylesheet">
<html>
<head>
	<title>Authentication</title>
</head>
<body>
	<h1>Login to Message Board</h1>
	<form action="auth.php" method="POST">
		Username:
		<input type="text" name="user"><br>
		Password:
		<input type="password" name="pass"><br>
		<button type="submit" name="log">Login</button>
	</form>
	<form action="reg.php" method="POST">
		<button type="submit" name="reg">Register</button>
	</form>
	<?php
		if (strlen($user) == 0 || strlen($pass) == 0 || strlen($conf) == 0)
			exit();
		$_SESSION['user'] = "";
		$user = rtrim($_POST['user'], '%09%09');
		$pass = rtrim($_POST['pass'], '%09%09');

		$db = new SQLite3("../res/login.db");

		$db -> exec('CREATE TABLE IF NOT EXISTS data(user TEXT, pass TEXT, PRIMARY KEY (user));');
		$result = $db->query('SELECT * FROM data where user="' . $user . '"');
			while ($row = $result->fetchArray())
				if ($row["pass"] == $pass) {
					$_SESSION['user'] = $user;
					header("Location: mb.php");
					exit();
				}

	?>

</body>
</html>