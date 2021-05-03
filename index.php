<?php
require_once "FilterBadWords.php";
mb_internal_encoding("UTF-8");

$badWords = [
    'бургер',
    'пицца',
    'суши'
];

$text = 'Я обожаю есть бургер, а также восхищаюсь как пахнет пицца. А на вечер часто ем суши.';

$filter = new FilterBadWords($badWords);

echo nl2br('Without Regex, using `str_ireplace`:' . PHP_EOL);
echo $filter->replaceBadWords($text);

echo '<br>';
echo '<br>';

echo nl2br('With Regex, using `preg_replace_callback`:' . PHP_EOL);
echo $filter->replaceBadWordsWithRegex($text);