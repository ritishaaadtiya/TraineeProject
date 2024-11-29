<?php
# Encapsulation --> Encapsulation is about hiding the "how" and showing only the "what".
class Capsul {
    private $name;
    public function set_name($name){
         $this->name = $name;
         
        
    }
    public function get_name(){
        echo $this->name;
    }
}
$capsul = new Capsul();

// Accessing the private property directly
echo $capsul->get_name();
# Example.2 - Grading system 
class Grads{
    private function get($StudentGrad){
        return $StudentGrad;
    }
    
    public function set_grad($grad){
        $StudentGrad = $grad;
        $result = $this->get($StudentGrad);
        echo "Student's Grade : ". $result;
    }
}
$student1 = new Grads();

$student1->set_grad("A");
echo "<br>";
# Example.3 -> Bank Account
class CreateAccount {
    private $balance;
    private $accountNumber;
    public function __construct($acc,$intial_balance){
        $this->balance = $intial_balance;
        $this->accountNumber = $acc;
    }
    public function get_balance(){
        return $this->balance;
    }
    public function get_accountNumber(){
        return $this->accountNumber;
    }
    public function deposit($amount){
        $this->balance += $amount;
        echo "Deposit Successful. from this account ".$this->accountNumber . "New Balance: ". $this->balance . "<br" . "Diposite ammount ". $amount;
    }
    public function withdraw($amount){
        if($amount < 0 || $amount > $this->balance){
            echo "Insufficient balance";
        }
        else{
            $this->balance -=  $amount;
            echo "Withdraw Successfully from this account " .$this->accountNumber ." Your balance " . $this->balance . "  Widhraw amount" . $amount;
            }
    }

}
$Account = new CreateAccount("rit123",2000);
$balance = $Account->get_balance();
$AccountNumber = $Account->get_accountNumber();
echo "The balance in $AccountNumber is $balance <br>";
$Account->deposit(2000);
echo "<br> <br>";
$Account->withdraw(500);

