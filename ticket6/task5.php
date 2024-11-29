<?php 
# Object Cloning ->  The process of creating a duplicate of an object using the clone keyword.
# Shallow Copy
class sweet{
    public $quanity;
  public function __construct($quanity){
    $this->quanity = $quanity;
  }
  
}
class fruit{
    public $name;
    public $color;
    public $sweet;
    public function __construct($name,$color,$sweet){
        $this->name  = $name;
        $this->color = $color;
        $this->sweet = $sweet;
    }
}
$Apple =new fruit("apple","red",new sweet(20));
echo "Fruit name is : ". $Apple->name . "  and color is : ". $Apple->color . "<br>";
# object cloning 
$Mango = clone $Apple;
$Mango->name = "Mango";
$Mango->color = "Yellow";
$Mango->sweet->quanity = 100;
echo "Apple sweet quanity is : ". $Apple->sweet->quanity . "<br>";

echo "Fruit name is : " . $Mango->name . " and color is : ". $Mango->color . "Sweeet Quantity is : ". $Mango->sweet->quanity . "<br>";
# Deep Copy
class ParentCls{
    public $surname;
    function __construct($surname){
        $this->surname = $surname;
    }
}
class ChildCls {
    public $name;
    public $surname;
    public function __construct($name,$surname){
        $this->name = $name;
        $this->surname = $surname;
    }
    public function __clone(){
       $this->surname = clone $this->surname;
    }
}
$obj1 = new ChildCls("rit",new ParentCls("aadtiya"));

$obj2 = clone $obj1;
$obj2->surname = "siddiqui";

echo "obj1 surname : ". $obj1->surname->surname . "<br>";

echo "obj2 surname : ". $obj2->surname . "<br>";
# Object refrence --> When you pass object to function you are passing the refrence of object 
class Phone{
    public $model;
    function __construct($model){
      $this->model = $model;
    }
}
function changemodel($Phone){
    $Phone->model = "Samsung";
}

$IPhone = new Phone("IPhone");
changemodel($IPhone);
echo "Phone model is : " . $IPhone->model;