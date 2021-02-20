<?php

namespace App\Utilitaires;

class Titre
{

    static function createTitle(string $title, int $length, string $separator, string $titleColor = Couleurs::RESET, string $separatorColor = Couleurs::RESET): string
    {
        $titleLength = strlen($title);
        $length -= $titleLength;
        $length = ($length % 2 === 0) ? $length : $length - 1;
        $side = str_repeat($separator, $length / 2);
        $title = $separatorColor . $side . '  ' . $titleColor . $title . $separatorColor . '  ' . $side . Couleurs::RESET . PHP_EOL;
        return $title;
    }
}
