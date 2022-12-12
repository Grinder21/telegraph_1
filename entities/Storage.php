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
    }

    private function storeText()
    {
    $mas = [
        'title' => $this->title,
        'text' => $this->text,
        'author' => $this->author,
        'published' => $this->published,
    ];
    $result = serialize($mas);
    file_put_contents($this->slug, $result);
    }

