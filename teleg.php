<?php

include 'telegraph.php';
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
    public $storage; // $storage = new Object()

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

class FileStorage extends Storage
{
    public function create():TelegraphText
    {
        $file = file_get_contents($slug);
        if (empty($file) === false)
        {
            $text = unserialize($file);
            return $text;
        }
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function list()
    {
        // TODO: Implement list() method.
    }
}



