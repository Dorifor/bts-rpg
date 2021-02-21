<?php 

namespace App\Utilitaires;

class Utils {
    static function effacerEcran()
    {
        // echo "\e[H\e[J";
        echo "\033[2J\033[;H";
        // system('clear');
        // static $oldLines = 0;
        // $numNewLines = count($output) - 1;
       
        // if ($oldLines == 0) {
        //   $oldLines = $numNewLines;
        // }
       
        // echo implode(PHP_EOL, $output);
        // echo chr(27) . "[0G";
        // echo chr(27) . "[" . $oldLines . "A";
       
        // $numNewLines = $oldLines;
    }
}