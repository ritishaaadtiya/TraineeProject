<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Basic oops concepts -->
    <?php
    class fruit{
        public $name; #create properties of the fruit
        public $color;
        public $weight;
        // Creating methods
        function set_name($name,$color,$weight){
           $this->name = $name;
           $this->color = $color;
           $this->weight = $weight;
        }
        function get_name(){
           return $this; # return all the properties
        }
    }
    // Creating objects
    $apple = new fruit("mango","yellow");
    $apple->set_name('apple','red',100);
    $properties = $apple->get_name();
    echo "Name : ". $properties->name."<br>"."Color : ". $properties->color."<br>"."weight : ". $properties->weight . "<br>";
    // Magic methods -- > automatically called In certain cases
    class Car{
        public $color;
        public $model;
      
        # Magict Method
        public function __construct($color, $model){
            $this->color = $color;
            $this->model = $model;
        }
        # get method - to get inacessable or 
        public function __get($name){
            return $this->arr[$name]??null;
        }
    }
    $Audi = new Car("white","Audi");
    echo "Car Color is ". $Audi->color  ."<br>". "Model is ". $Audi->model . "<br>";
    # get magic method 
    class Animal {
        private $arr = ["name" => "cat","color" => "black"];
        # Get magic method
        public function __get($name){
            return $this->arr[$name]??null; # null is returned blank if not found instead of error
        }
        # Set magic method
        public function __set($name, $value){
            $this->$name = $value;
        }
        # call magic method 
        public function __call($method,$args){
               return "Method $method is not defined in class ";
        }
        # toString magic method
        public function __tostring(){
            return "Cat name is $this->name";
        }
        # isset magic method
        public function __isset($name){
            return $this->arr[$name];
        }

    }
    $cat =  new Animal();
    echo "Cat sound  is : ". $cat->sound . "<br>"; # called get method
    $cat->sound = "Mehow"; #set property using set method 
    echo "Cat sound is : ". $cat->sound . "<br>"; # called get method again to print the new value
    echo "Calling undefined method : ". $cat->eat("mouse") . "<br>";  # called undefined method
    echo $cat . "<br>"; // calls toString magic method
    echo "Is cat name is set". isset($cat->name); # returns true if cat name is set
   
    ?>
</body>
</html>