<html>
	<head>
		<title>References as Function Arguments</title>
	</head>
	<body>
	<?php

		function ref_test(&$var) {
			//when something comes in, don't take its value, 
			//make a reference to that value,
			//therefore a and var are pointing at the same thing

			//it's similar to global, but we can have a differently
			//named variable in the local context
			$var = $var * 2;
		}
		$a = 10;
		ref_test($a);
		echo $a;
	
	?>
	</body>
</html>