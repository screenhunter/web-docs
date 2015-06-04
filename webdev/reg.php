<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<form action="reg.php" method="get">
		Username:
		<input type="text" name="user"><br>
		Password:
		<input type="password" name="pass"><br>
		Confirm Password:
		<input type="password" name="conf"><br>
		<button type="submit" name="log">Register</button>
	</form>
	<?php
		$user = rtrim($_GET['user'], '%09%09');
		$pass = rtrim($_GET['pass'], '%09%09');
		$conf = rtrim($_GET['conf'], '%09%09');

		$db = new SQLite3("../res/login.db");
		$db -> exec('CREATE TABLE IF NOT EXISTS data(user TEXT, pass TEXT, PRIMARY KEY (user));');
		$result = $db->query('SELECT * FROM data where user="' . $user . '"');
			while ($row = $result->fetchArray())
				if ($row["user"] == $user) {
					echo $user . " is Taken!";
				}

		header("Location: auth.php");
		exit();

	?>

</body>
</html>