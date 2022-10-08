<?php

class TelegraphText {
    public $title, $text, $author, $published, $slug;

    public function __construct($author, $slug) {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date('Y-m-d H:i:s');
        $this->storeText();

    }

    public function storeText() {
        $mas = [
            'title' => $this->title,
            'text' => $this->text,
            'author' => $this->author,
            'published' => $this->published,
        ];
        $result = serialize($mas);
        $slug = 'test.txt';
        file_put_contents($slug, $result);
    }

//    public function loadText($file, $mas) {
//        $file = file_get_contents($this->slug);
//        if (empty($file) === false) {
//            unserialize($file, $mas);
//            echo $mas[0]['text'];
//        } else {
//            echo "Данный файл пустой. Выберите другой...";
//        }
//    }

//    public function editText($title, $text) {
//        $this->title = $title;
//        $this->text = $text;
//    }
}

$postTest = new TelegraphText("Михаил Ефремов", "test.txt");
$postTest->title = "Заголовок №1";
$postTest->text = "Сообщение письма";
$postTest->published = date('Y-m-d H:i:s');
$postTest->storeText();