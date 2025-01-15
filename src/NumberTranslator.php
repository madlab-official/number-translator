<?php

namespace Madlab\NumberTranslator;

use Madlab\NumberTranslator\Interfaces\NumberTranslatorInterface;
use Madlab\NumberTranslator\Translators\BanglaTranslator;
use Madlab\NumberTranslator\Translators\EnglishTranslator;
use Madlab\NumberTranslator\Translators\HindiTranslator;

include_once "RegisterTranslator.php";

abstract class NumberTranslator implements NumberTranslatorInterface
{
    protected $data;
    protected $from_translate;
    protected $to_translate;

    public const ERROR_CODE_TRANSLATOR_NOT_FOUND = 4404;

    public static function build(string $data, int $from_translate, $to_translate = NUMBER_TRANSLATOR_ENGLISH): object
    {
        try {
            return match ($from_translate) {
                NUMBER_TRANSLATOR_ENGLISH => new EnglishTranslator($data, $from_translate, $to_translate),
                NUMBER_TRANSLATOR_BANGLA => new BanglaTranslator($data, $from_translate, $to_translate),
                NUMBER_TRANSLATOR_HINDI => new HindiTranslator($data, $from_translate, $to_translate),
                default => throw new \Exception("Translator not found!", self::ERROR_CODE_TRANSLATOR_NOT_FOUND),
            };
        } catch (\Throwable $throwable) {
            $error_message = "Translate failed, Translator not match.";
            if ($throwable->getCode() === self::ERROR_CODE_TRANSLATOR_NOT_FOUND) {
                $error_message = $throwable->getMessage();
            }

            return new \Exception($error_message, $throwable->getCode());
        }

    }

    public function getOriginalData(): string
    {
        return $this->data;
    }

    private function toEnglish(): string
    {
        $translate_data = "";
        $number_characters = array_merge($this->getNumberCharacters(), $this->getExtraNumberCharacters());
        foreach (mb_str_split($this->data) as $character) {
            if (in_array($character, $number_characters)) {
                $translate_data .= array_search($character, $number_characters);
            } else {
                $translate_data .= $character;
            }
        }

        return $translate_data;
    }

    private function fromEnglish(): string
    {
        $translate_data = "";
        $otherTranslator = self::build($this->data, $this->to_translate);
        $number_characters = array_merge($otherTranslator->getNumberCharacters(), $otherTranslator->getExtraNumberCharacters());
        foreach (mb_str_split($this->data) as $character) {
            if (array_key_exists($character, $number_characters)) {
                $translate_data .= $number_characters[$character];
            } else {
                $translate_data .= $character;
            }
        }

        return $translate_data;
    }

    private function toOthers(): string
    {
        $translate_data = "";
        $number_characters = array_merge($this->getNumberCharacters(), $this->getExtraNumberCharacters());

        $otherTranslator = self::build($this->data, $this->to_translate);
        $to_number_characters = array_merge($otherTranslator->getNumberCharacters(), $otherTranslator->getExtraNumberCharacters());

        foreach (mb_str_split($this->data) as $character) {
            if (in_array($character, $number_characters)) {
                $key = array_search($character, $number_characters);
                $translate_data .= $to_number_characters[$key];
            } else {
                $translate_data .= $character;
            }
        }

        return $translate_data;
    }

    public function translate(): string
    {
        try {
            if ($this->from_translate === $this->to_translate) {
                return $this->data;
            } elseif ($this->to_translate === NUMBER_TRANSLATOR_ENGLISH) {
                return $this->toEnglish();
            } elseif ($this->from_translate === NUMBER_TRANSLATOR_ENGLISH) {
                return $this->fromEnglish();
            } else {
                return $this->toOthers();
            }
        } catch (\Throwable $throwable) {
            //do log
            return "";
        }
    }

    public static function to(string $data, int $from_translate, $to_translate = NUMBER_TRANSLATOR_ENGLISH)
    {
        try {
            return self::build($data, $from_translate, $to_translate)->translate();
        } catch (\Throwable $throwable) {
            //do log
            return "";
        }
    }

    public function translateOnlyNumber(): array
    {
        return [];
    }
}
