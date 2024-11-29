<?php
#Access modifier
# public - > by default access anywhere in code
class student{
    public $collageName = "PIEMR";
    public function getCollageName(){
        return $this->collageName;
    }
}
$s1 = new student("rit",20);
$clgname = $s1->getCollageName();

echo "Collage Name: ". $clgname;

# protected --> only accessbale within class and derived class
# Private--> only accessable within class
class Employee{
    private $empSalary = 200000;
    private function getsalary(){
        return $this->empSalary;
    }
}
$e1 = new Employee();
# echo "Employee salary is : ". $e1->getsalary(); # gives error can not acess the private method outside the class