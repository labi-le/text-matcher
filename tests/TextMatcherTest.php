<?php

namespace Astaroth;

use PHPUnit\Framework\TestCase;

class TextMatcherTest extends TestCase
{

    private array $needles = ["aboba", "hi", "cat", "katy", "succession"];
    private array $haystack =
        ["aboba", "hi me name is John Cena!", "funny cat", "katya", "a science that studies the past, real facts and patterns of succession of historical events"];

    private array $validation_constants =
        [0, TextMatcher::START_AS, TextMatcher::END_AS, TextMatcher::SIMILAR_TO, TextMatcher::CONTAINS];

    public function testCompare()
    {
        for ($i = 0, $iMax = count($this->needles); $i < $iMax; $i++) {
            $TextMatcher = new TextMatcher(
                $this->needles[$i],
                $this->haystack[$i],
                $this->validation_constants[$i]);

            self::assertTrue($TextMatcher->compare());
        }
    }
}
