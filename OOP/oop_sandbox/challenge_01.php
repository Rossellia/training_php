<?php 
//define class for bicycle
//properties: brand, model, year, description, weight_kg
//methods: name --(concat brand, model, year), weight_lbs -- (convert kg to lbs, 1kg = 2.2046226218), set_weight_lbs --(pass weight in lbs, convert to kg, save it)
//instantiate, set and read properties, call all methods


class Bicycle{
    var $brand;
    var $model;
    var $year;
    var $description = 'None';
    var $weight_kg = 0.0;


    function name(){
        return $this->brand . " " . $this->model . " {" . $this->year . "}";
    }

    function weight_lbs(){
        $conversion_rate = 2.2046226218;
        return floatval($this->weight_kg) * $conversion_rate;
    }

    function set_weight_lbs($weight_lbs){
        $conversion_rate = 2.2046226218; 
        if($weight_lbs >= 0){
            $this->weight_kg = (float)$weight_lbs/$conversion_rate;
        } 
    }


}

$bike1 = new Bicycle;
$bike1->model = "Mountain Bike";
$bike1->brand = "Extreme";
$bike1->year = 2019;
$bike1->weight_kg = 15;

echo $bike1->name() . "<br/>";
echo $bike1->weight_lbs() . "<br/>";
echo $bike1->set_weight_lbs(30) . "<br/>";

echo $bike1->weight_kg . "<br/>";
echo $bike1->weight_lbs() . "<br/>";



?>