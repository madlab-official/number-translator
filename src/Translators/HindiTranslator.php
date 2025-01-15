<?php

namespace Madlab\NumberTranslator\Translators;

use Madlab\NumberTranslator\NumberTranslator;

class HindiTranslator extends NumberTranslator
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
                '0' => '०',
                '1' => '१',
                '2' => '२',
                '3' => '३',
                '4' => '४',
                '5' => '५',
                '6' => '६',
                '7' => '७',
                '8' => '८',
                '9' => '९',
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
