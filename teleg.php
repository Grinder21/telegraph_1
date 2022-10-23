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
    public $slug;

    public function create($object)
    {
        $object->$slug = $object->$slug . '_' . date('Y-m-d H:i:s');
        $this->slug = $object->slug;
        $filePutContent = file_put_contents($object->slug, serialize($object));

        for ($i = 1; $i > 0; $i++)
        {
            if (file_exists($object->slug))
            {
                if (file_exists($object->slug . '_' . $i))
                {
                    continue;
                } else {
                    $object->slug = $object->slug . '_' . $i;
                    $filePutContent;
                    break;
                }
            } else {
                $filePutContent;
                break;
            }
        }
        return $this->slug;
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

$FileStorage = new FileStorage();
$test = new TelegraphText("Михаил Ефремов", 'test.txt');
$test->editText('test text', 'test title');
$test->storeText();
$FileStorage->create($test);

var_dump($FileStorage->slug);


