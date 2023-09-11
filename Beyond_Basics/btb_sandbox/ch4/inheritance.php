<?php

class Car {
	var $wheels = 4;
	var $doors = 4;
	
	function wheelsdoors() {
		return $this->wheels + $this->doors;
	}
}

class CompactCar extends Car { //inherit all behaviours from car
	var $doors = 2;
	function wheelsdoors() {
		return $this->wheels + $this->doors + 100;
	}
	
}

$car1 = new Car();
$car2 = new CompactCar();

echo $car1->wheels ."<br />";
echo $car1->doors ."<br />";
echo $car1->wheelsdoors() ."<br />";
echo "<br />";

echo $car2->wheels ."<br />";
echo $car2->doors ."<br />";
echo $car2->wheelsdoors() ."<br />";
echo "<br />";

echo "Car parent: ".get_parent_class('Car') ."<br />"; //parent class of car
echo "CompactCar parent: ".get_parent_class('CompactCar') ."<br />"; //parent class of CompactCar
echo "<br />";
echo is_subclass_of('Car', 'Car') ? 'true' : 'false';
echo "<br />";
echo is_subclass_of('CompactCar', 'Car') ? 'true' : 'false'; //CompactCar is a subclass of Car
echo "<br />";
echo is_subclass_of('Car', 'CompactCar') ? 'true' : 'false';
echo "<br />";

?>