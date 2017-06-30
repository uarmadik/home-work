<?php

$page_url = $_GET['url-link'];
    if ((!$page_url) || (is_numeric($page_url))) {
        echo "Помилка!";
        return;
    }
$page = file($page_url);
$image_count = '';
$jpg_count = '0';
$png_count = '0';
$gif_count = '0';
$allImgTags = '';
$path_to_img = '';
$path = '';

    foreach ($page as $line_content) {
        $result = preg_match_all('/<img[^>]+>/i', $line_content, $img_tag);
        if ($result) {
            $allImgTags[] = $img_tag;
        }
    }

    echo "Кількість зображень: " . count($allImgTags) . "</br>";

    foreach ($allImgTags as $path_to_img1) {
        foreach ($path_to_img1 as $path_to_img2){
            foreach ($path_to_img2 as $path_to_img3) {
                preg_match('/(src)=("[^"]*")/i', $path_to_img3, $path_to_img[]);
            }
        }
    }

    foreach ($path_to_img as $value) {
        $path[] = $value[2];
    }
    $count_path = count($path);
    for ($i = 0; $i < $count_path; $i++){
        $path[$i] .= "\n";
        $file_position = $i + 1;
        echo "File $file_position: " . $path[$i] . "</br>";
        $is_jpg = strpos($path[$i], ".jpg");
        $is_png = strpos($path[$i], ".png");
        $is_gif = strpos($path[$i], ".gif");
        if ($is_jpg) {
            $jpg_count++;
        }
        if ($is_png) {
            $png_count++;
        }
        if ($is_gif) {
            $gif_count++;
        }
    }

$header = "On page - " . $page_url ." - ". count($allImgTags) . " pictures (jpg, png, gif)" . "\n"."jpg - " . $jpg_count .  "\n"."png - " . $png_count .  "\n"."gif - " . $gif_count .  "\n";
echo $header;

$file_name = parse_url($page_url, PHP_URL_HOST);
$time = date('H-i-s');

    for ($i = 0; $i <= strlen($file_name); $i++) {
        if ($file_name[$i] == "."){
            $file_name[$i] = "-";
        }
    }

$file_name = 'txt/' . $file_name . "_" . $time . '.txt';
file_put_contents($file_name, $header);
file_put_contents($file_name, $path, FILE_APPEND);

$path_to_txt = '\'' . $file_name . '\'';

echo "</br></br> <a href=\"$file_name\" target='_blank'> File txt </a>";