<?php 
// Abstract class
abstract class PrintMsg{
    public $name;
    public function __construct($name){
        $this->name = $name;
    }
    abstract function display($name);
}

// Implementing abstract class
class GetMsg extends PrintMsg{
    public function display($name){
        echo "Hello " . $name;
    }
}
$msg = new GetMsg("ritisha");
$msg->display("ritisha");