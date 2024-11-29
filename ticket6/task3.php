<?php
# Polymorphism  - > Polymorphism means that you can use the same method name, but the behavior of that method can vary depending on the object (class) calling it.
# For Example : Imagine you have a remote control that can control different devices like a TV, a Fan, and an AC. All these devices can be turned on using the same button on the remote, but the action of "turning on" is different for each device

# Parent class - Remote Control
class RemoteControl {
    public function turnOn(){
        echo"Device is Turn on <br>";
    }
}

# Child classes - TV, Fan, AC
class TV extends RemoteControl {
   public function turnOn(){
       echo "TV is turned on <br>";
   }
}

class Fan extends RemoteControl {
    public function turnOn(){
        echo "Fan is turned on <br>";
    }
}
class AC extends RemoteControl {
    public function turnOn(){
        echo "AC is turned on <br>";
    }
}
# Creating objects of child classes
$Remote = new RemoteControl();
$tv = new TV();
$fan = new Fan();
$ac = new AC();

# Calling the turnOn method of parent class using objects of child classes
$Remote->turnOn();
$tv->turnOn();
$fan->turnOn();
$ac->turnOn();

