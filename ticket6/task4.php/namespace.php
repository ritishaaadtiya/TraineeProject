<?php
require "logA.php";
require "logB.php";
# Acessing the class and creating the object of it 
$objLogA = new \ClassLogA\Log("Good Morning!,");
$objLogA->print();
echo "<br>";
$objLogB = new \ClassLogB\Log("Good Morning!,");
$objLogB->print();