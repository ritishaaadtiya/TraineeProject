<?php
namespace ClassLogB;
class Log{
    public $msg;
    public function __construct($msg){
        $this->msg = $msg;
    }
    public function print(){
        echo $this->msg ."This is class logB";
    }
}