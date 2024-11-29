<?php
# Single Inheritance - > one base class and one Inarited class
# parent class
class fruit {
    public $name;
    public $color;
    function __construct($name,$color){
        $this->name = $name;
        $this->color = $color;
    }
    public function display_Data(){
       echo "fruite name is ". $this->name;
       echo  " and color is " . $this->color;
    }
 
}
$f1 = new fruit("mango","yellow");
$f1->display_Data();
echo "<br>";
# Child class
class Cherry  extends fruit{
   public function message(){
     echo "This is a cherry";
   }

}
$C1 = new Cherry("cherry","green");
$C1->display_data();

// Inheritance with protected modifires

class student {
   public $name;
   protected $roll;
   public function __construct($name,$age){
    $this->name = $name;
    $this->roll = $age;
   }
   protected function display(){
    echo "Name : " . $this->name . "roll no : " . $this->roll;
   }
}
class teacher extends student {
    public function data() {
      return $this->display();
    }
}
$t1 = new teacher("ritisha",101);

echo $t1->data(). "<br>";

# MultiLevel Inheritance -> A class inherits from another class, which itself inherits from another class. This creates a chain of inheritance.
class GrandParent {
  public function grandparent(){
    echo "this is a grand parent method <br>";
  }
}
class ParentClass extends GrandParent {
    public function ParentData(){
      echo "this is a parent class method <br>";
    }
}

class ChildClass extends ParentClass{
   function ChildData(){
    echo "this is a child class method <br>";
   }
}
$child  = new ChildClass();
$child->ChildData();
$child->grandparent();
$child->ParentData();
// Hierarchical Inheritance - Multiple classes inherit from a single parent class.
class Human{
   public function empathy(){
    echo "Ability to understand and share the feelings of others <br>";
   }
}
class Person extends Human{
    public function person(){
    echo "This is person method <br>";
   }
}
class Employe extends Human{
   public function employee(){
    echo "This is employee method <br>";
   }
}
$e1 = new Employe();
$e1->empathy();
$p1 = new Person();
$p1->empathy();
# Hybrid Inheritance -> combine multiple inheritance
trait Common{
  public function commonfunction(){
    echo "common function <br>";
  }
}
class ParentHybrid {
  use Common;
}
class ChildHybrid {
  use Common;
}

$parent = new ParentHybrid();

$parent->commonfunction();

$child = new ChildHybrid();

$child->commonfunction();
#Multiple Inheritance --> Class can derived from multiple Parent classes we can achive this by using interfaces
interface func1{
  function show($n1,$n2);
  function sum($n1,$n2);
}
interface func2{
  function diff($n1,$n2);
}
class math implements func1, func2{
  public function sum($n1,$n2){
    return $n1+$n2;
  }
  public function diff($n1,$n2){
    return $n1-$n2;
  }
  public function show($n1,$n2){
    echo "sum : ".$this->sum($n1,$n2) . "<br>";
    echo "Diffrence : ".$this->diff($n1,$n2);
  }

}
$m1 = new math();
$m1->show(5,3);

