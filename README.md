# text-matcher

[![GitHub license](https://img.shields.io/badge/license-BSD-green.svg)](https://github.com/labi-le/text-matcher/blob/main/LICENSE)
[![Packagist Stars](https://img.shields.io/packagist/stars/labile/text-matcher)](https://packagist.org/packages/labile/text-matcher/stats)
[![Packagist Stats](https://img.shields.io/packagist/dt/labile/text-matcher)](https://packagist.org/packages/labile/text-matcher/stats)

## Installation

`composer require labile/text-matcher`

### A simple string comparison library

```php
<?php

declare(strict_types=1);

use Astaroth\TextMatcher;

$textMatcher = new TextMatcher("i love Katya", "love", TextMatcher::CONTAINS);
if ($textMatcher->compare()){
    //...
}
```