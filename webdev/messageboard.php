<!DOCTYPE html>
<html>
<head>
	<?php
		echo '<title>' . $_SESSION['user'] . '\'s Message Board</title>';
	?>
</head>
<body>
	<div id="insert">
		<form action="messageboard.php" method="POST">
			Reminder:
			<input type="text" name="rem" size="50"><br>
			Month:
			<select  name="month">
  				<option value="0">January</option>
				<option value="31">February</option>
				<option value="59">March</option>
				<option value="90">April</option>
				<option value="120">May</option>
				<option value="151">June</option>
				<option value="181">July</option>
				<option value="212">August</option>
				<option value="243">Spetember</option>
				<option value="273">October</option>
				<option value="314">November</option>
				<option value="334">December</option>
			</select><br>
			Day:
			<input type="number" name="day"><br>
			Year:
			<input type="number" name="year"><br>
			<button type="submit" name="add">Add</button>
		</form>
	</div>
	<div id="messages">
		<?php

			function convert($value) {

				$year = floor($value/1000);
				$value -= $year*1000;
				$month = "";
				$day = 0;
				if ($value <= 31) {
					$month = "January";
					$day = $value;
				} else if ($value <= 59) {
					$month = "February";
					$day = $value - 31;
				} else if ($value <= 90) {
					$month = "March";
					$day = $value - 59;
				} else if ($value <= 120) {
					$month = "April";
					$day = $value - 90;
				} else if ($value <= 151) {
					$month = "May";
					$day = $value - 120;
				} else if ($value <= 181) {
					$month = "June";
					$day = $value - 151;
				} else if ($value <= 212) {
					$month = "July";
					$day = $value - 181;
				} else if ($value <= 243) {
					$month = "August";
					$day = $value - 212;
				} else if ($value <= 273) {
					$month = "September";
					$day = $value - 243;
				} else if ($value <= 314) {
					$month = "October";
					$day = $value - 273;
				} else if ($value <= 334) {
					$month = "November";
					$day = $value - 314;
				} else {
					$month = "December";
					$day = $value - 334;
				}

				return $month . " " . $day . ", " . $year;
				
			}
			$user = $_SESSION['user'];
			$message = rtrim($_POST['rem'], '%09%09');
			$day = intval(rtrim($_POST['day'], '%09%09'));
			$year = intval(rtrim($_POST['year'], '%09%09'));
			$month = intval(rtrim($_POST['month'], '%09%09'));
			$pri = $year*1000 + $month + $day;

			$db = new SQLite3("../res/message.db");
			if (strlen($message) != 0)
				$db -> exec('CREATE TABLE IF NOT EXISTS data(pri INTEGER, mess TEXT, PRIMARY KEY (pri));
					INSERT OR REPLACE INTO data (pri, mess) VAlUES(' . $pri . ', "' . $message . '");
				');

			$result = $db->query('SELECT pri FROM data');
			while ($row = $result->fetchArray())
				if (isset($_POST['id-' . $row["pri"]])) {
					$db -> exec('DELETE FROM data where pri = '  . $row["pri"]);
				}

			$result = $db->query('SELECT * FROM data ORDER BY pri');
			while ($row = $result->fetchArray()) {

				echo $row["mess"];
				echo 'Due: ' . convert($row["pri"]);
				echo '<form action="messageboard.php" method="POST">';
				echo '<button name = "id-' . $row["pri"] . '" type = "submit"> Delete </button>';
				echo '</form>';

			}

		?>
	</div>
</body>
</html>