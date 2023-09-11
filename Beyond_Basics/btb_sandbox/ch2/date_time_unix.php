<html>
	<head>
		<title>Dates and Times: Unix</title>
	</head>
	<body>
	<?php
		echo time(); //epochs, seconds passed since january 1st 1970 -- current time
		echo "<br />";
		echo mktime(2, 30, 45, 10, 1, 2009); //make time, ($hr, $min, $sec, $mo, $day, $yr)
		echo "<br />";
		// checkdate()
		echo checkdate(12,31,2000) ? 'true' : 'false';
		echo "<br />";
		echo checkdate(2,31,2000) ? 'true' : 'false';
		echo "<br />";
		

		$unix_timestamp = strtotime("now"); //string to time
		echo $unix_timestamp . "<br />";

		
		$unix_timestamp = strtotime("15 September 2015"); //string to time
		echo $unix_timestamp . "<br />";

		$unix_timestamp = strtotime("last Monday"); //string to time
		echo $unix_timestamp . "<br />";
	?>
	</body>
</html>