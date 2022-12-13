<?php

    require_once './interfaces/EventListenerInterface.php';
    require_once './interfaces/LoggerInterface.php';

    abstract class Storage implements LoggerInterface, EventListenerInterface
    {
        abstract public function create(TelegraphText $telegraphText): string;
        abstract public function read($id = null, $slug = null) : object;
        abstract public function update($item, $id = null, $slug = null);
        abstract public function delete($id = null, $slug = null);
        abstract public function list() : array;
        abstract public function logMessage($err);
        abstract public function lastMessages($messages): array;
        abstract public function attachEvent($methodName, $callBack);
        abstract public function detouchEvent($methodName);
    }


