<?php

// TODO: use namespace:
// namespace Minifier;
namespace App\Libs\TinyMinify;

class TinyMinify
{
    public static function html(string $html, array $options = []) : string
    {
        $minifier = new TinyHtmlMinifier($options);
        return $minifier->minify($html);
    }
}
