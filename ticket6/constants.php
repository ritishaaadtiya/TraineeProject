<?php 
//  Constant  --> we can define Constant in class by using the const and the name of the constant will be in uppercase in it not a rule its and recommended.  
class Constant {
    const MSG = "Welcome its constant";
    public function get(){
        return self::MSG; # by using it we can return the constant inside the class
    }

}
$c1 = new Constant();
echo $c1->get() . "<br>"; # this return -- >Welcome its constant
echo Constant::MSG; # if want to use constant outside the class using this syntax