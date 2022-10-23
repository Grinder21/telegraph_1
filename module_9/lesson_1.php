<?php

class A
{
    public $message;
}

class B extends A
{
    public function __construct()
    {
        $this->message = "Hello world!";
    }
    public function showMessage() {
        echo $this->message;
    }
}

$bObject = new B();
$bObject->showMessage();