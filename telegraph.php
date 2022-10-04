<?php

class TelegraphText {
    public $title, $text, $author, $published, $slug = 'test.txt';

    public function __construct($author, $slug) {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date('Y-m-d H:i:s');
        $this->storeText("Заголовок", "Тестовое сообщение", "Михаил Ефремов", "01.01.2022");

    }

    public function storeText($title, $text, $author, $published) {
        $mas = [
            'title' => $title,
            'text' => $text,
            'author' => $author,
            'published' => $published,
        ];
        $result = serialize($mas);
        $slug = 'test.txt';
        file_put_contents($slug, $result);
    }

    public function loadText($file, $mas) {
        $file = file_get_contents($this->slug);
        if (empty($file) === false) {
            unserialize($file, $mas);
            echo $mas[0]['text'];
        } else {
            echo "Данный файл пустой. Выберите другой...";
        }
    }

    public function editText($title, $text) {
        $this->title = $title;
        $this->text = $text;
    }
}

$postTest = new TelegraphText();

$postTest->title = "Заголовок поста";
$postTest->text = "Тестовое сообщение";
$postTest->author = "Михаил Ефремов";


