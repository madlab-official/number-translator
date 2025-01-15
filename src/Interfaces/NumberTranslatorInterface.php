<?php

namespace Madlab\NumberTranslator\Interfaces;

interface NumberTranslatorInterface
{
    public function __construct(string $data, int $from_translate, $to_translate = NUMBER_TRANSLATOR_ENGLISH);

    public function getNumberCharacters(): array;

    public function getExtraNumberCharacters(): array;

    public function translate(): string;

    public function translateOnlyNumber(): array;
}
