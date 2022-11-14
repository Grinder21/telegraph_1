<?php

include 'telegraph.php';

interface LoggerInterface
{
    public function logMessage($err);
    public function lastMessages($messages) : array;
}

interface EventListenerInterface
{
    public function attachEvent($methodName, $callBack);
    public function detouchEvent($methodName);
}

abstract class Storage implements LoggerInterface, EventListenerInterface
{
    abstract public function create(TelegraphText $telegraphText): string;
    abstract public function read($id = null, $slug = null) : object;
    abstract public function update($item, $id = null, $slug = null);
    abstract public function delete($id = null, $slug = null);
    abstract public function list() : array;
}

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

abstract class User implements EventListenerInterface
{
    public $id;
    public $name;
    public $role;

    abstract function getTextsToEdit()
    {
        // выводит список текстов, доступных пользователю для редактирования
    }

    public function attachEvent($methodName, $callBack)
    {
        // TODO: Implement attachEvent() method.
    }

    public function detouchEvent($methodName)
    {
        // TODO: Implement detouchEvent() method.
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
        $path = 'C:\xampp\htdocs\welcome';
        $dir = scandir($path);
        foreach ($dir as $item) {
            $file = file_get_contents($item);
        }
        return $file;
    }

    public function update($item, $id = null, $slug = null)
    {
        $result = file_put_contents('test.txt');
        return serialize($result);
    }

    public function delete($id = null, $slug = null)
    {
        // тут уместна конструкция allowed_classes?
        $filename = $telegraphText->slug;
        return unlink($filename);
    }

    public function list():array
    {
        $path = 'C:\xampp\htdocs\welcome';
        $dir = scandir($path);
        $arrayText = [];

        foreach ($dir as $item) {
            if (!is_dir($path . '\\' . $item)) {
                $file = file_get_contents($item);
                $text = unserialize($file, ['allowed_classes' => ['TelegraphText']]);
                if ($text instanceof TelegraphText) {
                    $arrayText[] = $text->text;
                }
            }
        }
        return $arrayText;
    }

    public function logMessage($err)
    {
        // TODO: Implement logMessage() method.
    }

    public function lastMessages($messages): array
    {
        return $array = [];
    }

    public function attachEvent($methodName, $callBack = null)
    {

    }

    public function detouchEvent($methodName)
    {

    }
}

$telegraphText = new FileStorage();
$test = new TelegraphText("Михаил Ефремов", 'test.txt');
$test->editText('test text', 'test title');
$test->storeText();
$telegraphText->create($test);
var_dump($telegraphText->slug);


