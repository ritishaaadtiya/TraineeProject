<?php
# Static - Static method call by class name no need to create a new instance
class StaticClass {
    static $name = "StaticProperty";
   static function display(){
     echo "This is a static method";
   }
   public function callStatic(){
     echo "inside the class" . self::$name . "<br>"; # call static property insdie the class
     echo "inside the class static method :  ".self::display() . "<br>"; // static method can be called using class name directly
   }
}
echo "outside the class : ".StaticClass::$name . "<br>"; # static property outside the class
$obj = new StaticClass();

$obj->callStatic(); 
StaticClass::display(); // Way to call static method
