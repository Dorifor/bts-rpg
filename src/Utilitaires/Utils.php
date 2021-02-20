<?php 

namespace App\Utilitaires;

class Utils {
    static function effacerEcran()
    {
        echo "\e[H\e[J";
    }
}