<?php

require_once 'class/DocxConversion.php';

var_dump($_POST);
var_dump($_FILES);
extract($_FILES);



$path = "menu/". $uploadMenu["name"];
$type = explode('.', $uploadMenu["name"]);

var_dump($type);

echo "<br>";

move_uploaded_file($uploadMenu["tmp_name"], $path);
rename($path, "menu/menu.pdf");

/* TODO : convert to pdf and rename it to menu.pdf */


header("Location: administration.php");

?>