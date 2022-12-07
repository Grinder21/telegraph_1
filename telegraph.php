<?php

class TelegraphText
{
    private $title;
    private $text;
    private $author;
    private $published;
    private $slug;

    public function __construct(string $author, string $slug, string $text, string $title)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date('Y-m-d H:i:s');
        $this->text = $text;
        $this->title = $title;
        $this->storeText();

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

    private function loadText($mas)
    {
        $file = file_get_contents($this->slug);
        if (empty($file) === false) {
            unserialize($file, $mas);
            return $this->text;
        } else {
            echo "Данный файл пустой. Выберите другой...";
        }
    }

    public function editText($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    // methods get and set

    public function __get($name)

    {
        switch ($name) {
            case 'title':
                return $this->title;
            case 'text':
                return $this->loadText($this->text);
            case 'author':
                return $this->author;
            case 'published':
                return $this->published;
            case 'slug':
                return $this->slug;
        }
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'title':
                $this->title = $value;
                break;
            case 'text':
                $this->text = $value;
                $this->storeText();
                break;
            case 'author':
                if (strlen($this->author) >= 120)
                {
                    return false;
                } else {
                    return $this->author = $value;
                }
            case 'published':
                if ($this->published > date('Y-m-d H:i:s') || $this->published == date('Y-m-d H:i:s')) {
                    return $this->published = $value;
                } else {
                    return false;
                }
            case 'slug':
                if (preg_match("/^[a-zA-Z]$/", $this->slug) == true){
                    echo "Строка не соответствует формату" . PHP_EOL;
                    return false;
                }
                $this->slug = $value;
                break;
        }
    }
}

//$postTest = new TelegraphText("Михаил Ефремов", "test.txt");
//$postTest->title = "Заголовок №1";
//$postTest->text = "Сообщение письма";
//$postTest->published = date('Y-m-d H:i:s');
//$postTest->storeText();