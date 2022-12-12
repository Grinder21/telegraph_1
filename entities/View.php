<?php

abstract class View
{
    public $storage;

    public function __construct()
    {
        //  как передать объект подкласса Storage в качестве параметра конструктора?
    }
    abstract function displayTextById()
    {
        // вывести текст, принимает $id в качестве параметра
    }
    abstract function displayTextByUrl()
    {
        // вывести текст, принимает $url в качестве параметра
    }
}