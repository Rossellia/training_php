<html>
	<head>
		<title>References as Function Return Values</title>
	</head>
	<body>
	<?php

		function &ref_return() { //function is sent out as a reference
			global $a;
			$a = $a * 2;
			return $a; //returning the value, not a
		}
		$a = 10;
		$b =& ref_return(); //reference
	
		echo "a: {$a} / b: {$b}<br />";
		$b = 30;
		echo "a: {$a} / b: {$b}<br />";


		function &increment(){
		  static $var = 0;
		  $var++;
		  return $var;
		}
		$a =& increment(); 		// var increments
		increment();      		// var increments
		$a++;					// var increments
		increment();			// var increments
		echo "a: {$a}<br />";   // 4 ($a incremented with $var)
		
	?>
	</body>
</html>