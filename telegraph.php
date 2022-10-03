<?php

class TelegraphText {
    public $title, $text, $author, $published, $slug = 'test.txt';

    public function __construct($author, $slug) {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date('Y-m-d H:i:s');
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

    public function loadText($slug) {

    }


}
