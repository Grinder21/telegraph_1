<?php

include 'telegraph.php';
abstract class Storage
{

    abstract function create(TelegraphText $telegraphText): string
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

    public function read(TelegraphText $telegraphText)
    {
        $file = file_get_contents($telegraphText->slug);
        return unserialize($file);
    }

    public function update(TelegraphText $telegraphText)
    {
        $result = file_put_contents($telegraphText->slug);
        return serialize($result);
    }

    public function delete(TelegraphText $telegraphText)
    {
        $filename = $telegraphText->slug;
        return unlink($filename);
    }

    public function list(TelegraphText $telegraphText)
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


