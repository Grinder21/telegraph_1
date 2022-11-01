<?php

include 'telegraph.php';
abstract class Storage
{
    abstract public function create(TelegraphText $telegraphText): string;
    abstract public function read($id = null, $slug = null) : object;
    abstract public function update($item, $id = null, $slug = null);
    abstract public function delete($id = null, $slug = null);
    abstract public function list() : array;
}

abstract class View
{
    public $storage; // $storage = new Object() так?

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

abstract class User
{
    public $id;
    public $name;
    public $role;

    abstract function getTextsToEdit()
    {
        // выводит список текстов, доступных пользователю для редактирования
        // откуда получить этот список текстов, что это за массив?
    }
}

class FileStorage extends Storage
{
    public function create(TelegraphText $telegraphText): string
    {
        $filename = $telegraphText->slug . '_' . date('Y-m-d H:i:s');
        $i = 1;
        while (file_exists($filename)) {
            $filename = $telegraphText->slug . '_' . date('Y-m-d H:i:s') . '_' . $i;
        }

        $telegraphText->slug = $filename;

        file_put_contents($telegraphText->slug, serialize($telegraphText));

        return $telegraphText->slug;
    }

    public function read($id = null, $slug = null)
    {
        $file = file_get_contents('test.txt');
        return unserialize($file);
        // как тут вернуть объект? если его нет в параметре и убрать unserialize на файл
    }

    public function update($item, $id = null, $slug = null)
    {
        $result = file_put_contents('test.txt');
        return serialize($result);
    }

    public function delete($id = null, $slug = null)
    {
        $filename = $telegraphText->slug; // как тут обратиться к slug иначе, если в параметре нет объекта $telegraphText
        return unlink($filename);
    }

    public function list()
    {
        $arr = [];
        $dir = 'C:\xampp\htdocs\welcome';
        $files = scandir($dir);
        unserialize($files, $arr);
        return $arr;
    }
}

$telegraphText = new FileStorage();
$test = new TelegraphText("Михаил Ефремов", 'test.txt');
$test->editText('test text', 'test title');
$test->storeText();
$telegraphText->create($test);
var_dump($telegraphText->slug);


