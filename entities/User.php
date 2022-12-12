<?php

    require_once './interfaces/EventListenerInterface.php';
    require_once './interfaces/LoggerInterface.php';

abstract class User implements EventListenerInterface
{
    protected $id;
    protected $name;
    protected $role;

    abstract function getTextsToEdit()
    {
        // выводит список текстов, доступных пользователю для редактирования
    }

    public function attachEvent($methodName, $callBack)
    {

    }

    public function detouchEvent($methodName)
    {

    }
}