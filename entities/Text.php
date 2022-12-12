<?php

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