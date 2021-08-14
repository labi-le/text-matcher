<?php

namespace Astaroth;

/**
 * Class TextMatcher
 * @package Astaroth
 */
class TextMatcher
{
    public const STRICT = 0;
    public const CONTAINS = 1;
    public const START_AS = 2;
    public const END_AS = 3;
    public const SIMILAR_TO = 4;

    private static int $similar_percent = 70;

    public function __construct(private string $needle, private string $haystack, public int $validation = TextMatcher::STRICT)
    {

    }

    public function compare(): bool
    {
        if ($this->validation === static::SIMILAR_TO) {
            return $this->similarTo() >= self::$similar_percent;
        }

        if ($this->validation === static::START_AS) {
            return $this->startAs();
        }

        if ($this->validation === static::END_AS) {
            return $this->endAs();
        }

        if ($this->validation === static::CONTAINS) {
            return $this->contains();
        }

        return $this->needle === $this->haystack;
    }

    private function similarTo(): int
    {
        similar_text($this->needle, $this->haystack, $percent);
        return $percent;
    }

    private function startAs(): bool
    {
        return str_starts_with($this->haystack, $this->needle);
    }

    private function endAs(): bool
    {
        return str_ends_with($this->haystack, $this->needle);
    }

    private function contains(): bool
    {
        return str_contains($this->haystack, $this->needle);
    }

    public static function setSimilarPercent(int $percent): void
    {
        self::$similar_percent = $percent;
    }
}
