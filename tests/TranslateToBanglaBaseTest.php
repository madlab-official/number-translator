<?php

namespace Madlab\NumberTranslator\Tests;

use Madlab\NumberTranslator\NumberTranslator;

class TranslateToBanglaBaseTest extends BaseTestCase
{
    public function testTranslateFromEnglishToBangla()
    {
        $from_translate = "100.1010";
        $to_translate = "১০০.১০১০";
        $value = NumberTranslator::build($from_translate, NUMBER_TRANSLATOR_ENGLISH, NUMBER_TRANSLATOR_BANGLA);
        $this->assertEquals(
            $to_translate,
            $value->translate(),
            "English to bangla failed."
        );
    }

    public function testTranslateFromBanglaToEnglish()
    {
        $from_translate = "১০০.১০১০";
        $to_translate = "100.1010";
        $value = NumberTranslator::build($from_translate, NUMBER_TRANSLATOR_BANGLA);
        $this->assertEquals(
            $to_translate,
            $value->translate(),
            "Bangla to english failed."
        );
    }

    public function testTranslateFromBanglaToHindi()
    {
        $from_translate = "১,০১০.১০১০";
        $to_translate = "१,०१०.१०१०";
        $value = NumberTranslator::build($from_translate, NUMBER_TRANSLATOR_BANGLA, NUMBER_TRANSLATOR_HINDI);
        $this->assertEquals(
            $to_translate,
            $value->translate(),
            "Bangla to hindi failed."
        );
    }

    public function testTranslateFromBanglaToHindiWithExtraText()
    {
        $from_translate = "আমার কাছে ১,০১০.১০১০ টাকা আছে।";
        $to_translate = "আমার কাছে १,०१०.१०१० টাকা আছে।";
        $value = NumberTranslator::build($from_translate, NUMBER_TRANSLATOR_BANGLA, NUMBER_TRANSLATOR_HINDI);
        $this->assertEquals(
            $to_translate,
            $value->translate(),
            "Bangla to hindi with extra text failed."
        );
    }

    public function testTranslateFromBanglaToHindiWithShortFunction()
    {
        $from_translate = "আমার কাছে ১,০১০.১০১০ টাকা আছে।";
        $to_translate = "আমার কাছে १,०१०.१०१० টাকা আছে।";
        $value = NumberTranslator::to($from_translate, NUMBER_TRANSLATOR_BANGLA, NUMBER_TRANSLATOR_HINDI);
        $this->assertEquals(
            $to_translate,
            $value,
            "Bangla to hindi with short function failed."
        );
    }

    public function testTranslateFromBanglaToEnglishWithShortFunction()
    {
        $from_translate = "১০০.১০১০";
        $to_translate = "100.1010";
        $value = NumberTranslator::to($from_translate, NUMBER_TRANSLATOR_BANGLA);
        $this->assertEquals(
            $to_translate,
            $value,
            "Bangla to english with short function failed."
        );
    }
}
