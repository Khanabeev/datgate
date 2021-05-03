<?php

class FilterBadWords
{
    /**
     * @var array
     */
    private array $badWords;

    /**
     * FilterBadWords constructor.
     * @param array $badWords
     * @param $text
     */
    public function __construct(array $badWords)
    {
        $this->badWords = $badWords;
    }

    /**
     * @param array $badWords
     */
    public function setBadWords(array $badWords): void
    {
        $this->badWords = $badWords;
    }

    /**
     * @param string $text
     * @param string $replacement
     * @return string
     */
    public function replaceBadWords(string $text, string $replacement = '**'): string
    {
        return str_ireplace($this->badWords, $replacement, $text);
    }

    /**
     * @param string $text
     * @param string $replacement
     * @return string
     */
    public function replaceBadWordsWithRegex(string $text, string $replacement = '*'): string
    {
        $pattern = '!' . implode('|', $this->badWords) . '!ui';
        return preg_replace_callback($pattern, function ($word) use ($replacement) {
            return str_repeat($replacement, mb_strlen($word[0]));
        }, $text);
    }

}