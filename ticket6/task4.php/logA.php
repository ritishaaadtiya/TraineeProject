<?php
namespace ClassLogA;
class Log{
    public $msg;
    public function __construct($msg){
        $this->msg = $msg;
    }
    public function print(){
        echo $this->msg . "this is class logA";
    }
}