<?php
# Dependency Indejection --> Dependency Injection is a way to give a class the tools it needs to do its job from the outside, rather than having the class create or manage those tools itself.
# For Example : Imagine a car needs a fuel pump to run. Instead of the car building its own fuel pump, we provide (inject) the fuel pump when creating the car.
class Fuel{
    function start(){
        echo "car started...";
    }
}
class Car{
    public $fuel;
    public function __construct($fuel){
         $this->fuel = $fuel;
    }
    function getFuel(){
         return $this->fuel->start();
    }
}
$fuel = new Fuel();# Create a FuelPump object (dependency)
$car = new Car($fuel);
$car->getFuel();

