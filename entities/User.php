<?php

    require_once './interfaces/EventListenerInterface.php';
    require_once './interfaces/LoggerInterface.php';

abstract class User implements EventListenerInterface, LoggerInterface
{
    protected $id;
    protected $name;
    protected $role;

    abstract public function getTextsToEdit(); // выводит список текстов, доступных пользователю для редактирования
    abstract public function attachEvent($methodName, $callBack);
    abstract public function detouchEvent($methodName);

}