<?php

namespace Madlab\NumberTranslator\Translators;

use Madlab\NumberTranslator\NumberTranslator;

class BanglaTranslator extends NumberTranslator
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
                '0' => '০',
                '1' => '১',
                '2' => '২',
                '3' => '৩',
                '4' => '৪',
                '5' => '৫',
                '6' => '৬',
                '7' => '৭',
                '8' => '৮',
                '9' => '৯',
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
