<?php

abstract class Storage
{
    public $title;
    public $text;
    public $author;
    public $published;
    public $slug;
    abstract function create()
    {

    }
    abstract function read()
    {

    }
    abstract function update()
    {

    }
    abstract function delete()
    {

    }
    abstract function list()
    {

    }
}

abstract class View
{
    public $storage; // $storage = new Object(), какой Object - не ясно

    public function __construct()
    {
        //  передать объект подкласса Storage в качестве параметра конструктора.
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

abstract class User
{
    public $id;
    public $name;
    public $role;

    abstract function getTextsToEdit()
    {
        // выводит список текстов, доступных пользователю для редактирования
    }
}


