<?php

namespace Madlab\NumberTranslator\Translators;

use Madlab\NumberTranslator\NumberTranslator;

class EnglishTranslator extends NumberTranslator
{
    public function __construct(string $data, int $from_translate, $to_translate = NUMBER_TRANSLATOR_ENGLISH)
    {
        $this->data = $data;
        $this->from_translate = $from_translate;
        $this->to_translate = $to_translate;
    }

    public function getNumberCharacters(): array
    {
        return
            [
                '0' => '0',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
            ];
    }

    public function getExtraNumberCharacters(): array
    {
        return
            [
                '.' => '.',
                ',' => ',',
            ];
    }
}
