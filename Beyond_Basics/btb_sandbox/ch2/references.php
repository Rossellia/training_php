<html>
	<head>
		<title>Reference Assignment</title>
	</head>
	<body>
	<?php
	
	$a = 1;
	$b = $a;
	$b = 2;
	echo "a:{$a} / b: {$b}<br />";
	// returns 1/2

	$a = 1;
	$b =& $a; //b points to a,  when we change the value of b, it changes a at the same time because they point to the same thing 
	$b = 2;
	echo "a:{$a} / b: {$b}<br />";
	// returns 2/2
	
	unset($b);
	echo "a:{$a} / b: {$b}<br />";
	
	?>
	</body>
</html>