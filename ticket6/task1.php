<?php
# Count the number of objects using Static member function
class CountObject{
    static $count = 0;
    public function __construct(){
        self::$count++;
    }
    public static function get_count(){
        return self::$count;
    }
}

$obj1 = new CountObject();
$obj2 = new CountObject();
$obj3 = new CountObject();
echo CountObject::get_count();