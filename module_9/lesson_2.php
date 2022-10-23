<?php
class Animal
{
    public function showMyName()
    {
        echo "I'm an animal" . PHP_EOL;
    }
}

class Cat extends Animal
{
    public function showMyName()
    {
        parent::showMyName();
        echo "I'm a cat" . PHP_EOL;
    }
}

class Dog extends Animal
{
    public function showMyName()
    {
        parent::showMyName();
        echo "I'm a dog" . PHP_EOL;
    }
}

$cat = new Cat();
$dog = new Dog();

$cat->showMyName();
$dog->showMyName();
