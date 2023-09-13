<html>
	<head>
		<title>Variable Scope</title>
	</head>
	<body>
	<?php

	$var = 1;
	function test1() {
		$var = 2;
		echo $var . "<br />";
	}
	test1();
	echo $var . "<br />";
	
	echo "<hr />";

	$var = 1;
	function test2() {
		global $var; //modify the value in global scope if you modify in local
		$var = 2; 
		echo $var . "<br />";
	}
	test2();
	echo $var . "<br />";
	
	echo "<hr />";

	$var = 1;
	function test3() {
		static $var = 2; //modifies variables every time, but only in the local scope, not in the global scope
		echo $var . "<br />";
		$var++;
	}
	test3();
	test3();
	test3();
	echo $var . "<br />";
	?>
	</body>
</html>