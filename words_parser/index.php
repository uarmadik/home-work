<!--
    ДЗ: фільтер мату. В файлі з налаштуванням сайту є масив з матами = [мат_1, мат_2... мат_n]
1)Релізувати фкнкції додавання і видалення нових матів в список.
2) створити функцію яка буде приймати файл, аналізувати його на мати і формувати html
з підкресленими матами, html завантажити у фрейм.
3) вивести число знайдених матів. Все.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Work</title>
</head>
<body>
    <div>
        <p>
            <?php
                include_once 'manage_censore_words.php';
                function show_words_list()
                {
                    $words_array = read_file('censore_words.txt');
                    if ($words_array) echo '</br> Words list: </br>';
                    foreach ($words_array as $value) {
                        echo ' - ' . $value . '</br>';
                    }
                }
                if (isset($_GET['add_word']) && $_GET['word']) {
                    $word = $_GET['word'];
                    manage_censore_words('censore_words.txt', 'add_word',$word);
                    show_words_list();
                }
                elseif (isset($_GET['remouve_word']) && $_GET['word']) {
                    $word = $_GET['word'];
                    manage_censore_words('censore_words.txt', 'remouve_word',$word);
                    show_words_list();
                }
                else show_words_list();
            ?>
        </p>
        <form>
            <input type="text" name="word" placeholder="Word">
            <input type="submit" name="add_word" value="Add the word to words list">
            <input type="submit" name="remouve_word" value="Remouve the word to words list">
        </form>
    </div>


    <form action="">
        <input type="text" name="url" placeholder="Type URL here ...">
        <input type="submit" value="Parse">
    </form>

</body>
</html>

<?php

function parse($path_to_file)
{

    include_once 'manage_censore_words.php';
    $words_array = read_file('censore_words.txt');
    $content = file_get_contents($path_to_file);

    $result = array();

    foreach ($words_array as $value) {
        $mark_word = "<ins>" . $value . "</ins>";
        $content = str_replace($value, $mark_word, $content, $count);
        $result[$value] = $count;
        echo 'Word \'<b>' . $value . '\'</b> found <b>' . $count . '</b> times. </br>';

    }
    echo '<hr>';

    //print_r($content);
    file_put_contents('test.html', $content);
    echo '<iframe src="test.html" width="800" height="500"></iframe>';

    return $result;
}


    if (isset($_GET['url']) && filter_var($_GET['url'])){
        $url = $_GET['url'];
        echo 'Web site: ' . $url . '</br>';
        parse($url);
    }
    else return false;

