<?php

/*
 * Створити файл
 * Перевірити наявність
 * Записати інформацію про користувача
 * Зчитати інформацію про користувача
 * Вивести розмір файлу
 * Написати скрипт, який виводить на екран дерево каталога /usr та пропускає файли
 * в яких заборонено запис. (викор. Рекурсію)
 */

define(USER_FILE, 'user_data\user_files\user_data.txt');
define(USER_NAME, 'User-1');

file_put_contents(USER_FILE,'');
var_dump(file_exists(USER_FILE));
if (file_exists(USER_FILE)) file_put_contents(USER_FILE,USER_NAME);

$user_name = file_get_contents(USER_FILE);
$file_size = filesize(USER_FILE);
$file_name = basename(USER_FILE);
echo 'User data ' . $user_name . '</br>';
echo 'File size ' . $file_size . ' bites </br>';
echo 'File name: ' . $file_name . '</br>';

//var_dump(scandir('D:\OpenServer\domains\home-work\file_job'));

function showDir($path, $space)
{
    $array = scandir($path);
    foreach ($array as $value) {
        if (($value == '.') || ($value == '..')) continue;
        $full_path = $path . '/' . $value;
        if (is_dir($full_path)){
            echo $space . $value . '</br>';
            showDir($full_path, $space.' - ');
        }
        else echo $space . $value . '</br>';
    }
}

$path = './';
showDir($path, ' ');



function showTree($folder, $space) {
    /* Получаем полный список файлов и каталогов внутри $folder */
    $files = scandir($folder);
    foreach($files as $file) {
        /* Отбрасываем текущий и родительский каталог */
        if (($file == '.') || ($file == '..')) continue;
        $f0 = $folder.'/'.$file; //Получаем полный путь к файлу
        /* Если это директория */
        if (is_dir($f0)) {
            /* Выводим, делая заданный отступ, название директории */
            echo $space.$file."<br />";
            /* С помощью рекурсии выводим содержимое полученной директории */
            showTree($f0, $space.'&nbsp;&nbsp;');
        }
        /* Если это файл, то просто выводим название файла */
        else echo $space.$file."<br />";
    }
}
/* Запускаем функцию для текущего каталога */
//showTree("./", "");

