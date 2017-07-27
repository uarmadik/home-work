<?php

require_once 'Word.php';
require_once 'Sentence.php';
require_once 'Text.php';

$text = new Text();
echo ($text->create_text(5));
