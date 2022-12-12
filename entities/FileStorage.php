<?php
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