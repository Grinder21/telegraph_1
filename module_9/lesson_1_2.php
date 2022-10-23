<?php
class Employee
{
    public $name;
    public $position;
    public $age;
    public $firstname;

     public function setParameters($name, $firstname, $position, $age)
     {
         $this->name = $name;
         $this->position = $position;
         $this->age = $age;
         $this->firstname = $firstname;
     }

     public function showEmployeeInfo()
     {
         echo "EmployeeName: " .$this->name . " EmployeeFirstname: ". $this->firstname . " Set: " .$this->position . " Age: " .$this->age . " years old " . PHP_EOL;
     }
}

class Accountant extends Employee
{
    public function prepareReport()
    {
        echo "I access one years total " . PHP_EOL;
    }
}

class CEO extends Employee
{
    public function fireEmployee($name)
    {
        echo "I'm uninvite " . $name . PHP_EOL;
    }
}

class Welder extends Employee
{
    public function makeWeld()
    {
        echo "I make big iron weld" . PHP_EOL;
    }
}

$accountant = new Accountant();
$accountant->setParameters("Marya", "Ivanova", "Main accountant", "28");
$accountant->prepareReport();
$accountant->showEmployeeInfo();