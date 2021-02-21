<?php

const POSITION_VIDE = "x";
const POSITION_HERO = "H";
const POSITION_OBSTACLE = "O";
const POSITION_PERSONNAGE = "P";

$f = fopen('map2', 'rb');
$map = fread($f, filesize('map2'));
$lines = explode(PHP_EOL, $map);
$mapArray = [];
foreach ($lines as $line) {
    // array_push($maparray, str_split($block));
    $newLine = [];
    $tiles = str_split($line);
    foreach ($tiles as $tile) {
        switch ($tile) {
            case '-':
                array_push($newLine, POSITION_VIDE);
                break;
            
            case 'H':
                array_push($newLine, POSITION_HERO);
                break;
            
            default:
                array_push($newLine, POSITION_VIDE);
                break;
        }
    }
    array_push($mapArray, $newLine);
}
print_r($mapArray);

