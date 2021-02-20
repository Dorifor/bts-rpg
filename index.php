<?php

use App\Map;
use App\Utilitaires\Couleurs;
use App\Utilitaires\Utils;

require 'vendor/autoload.php';

Utils::effacerEcran();

$map = new Map(10, 10);
echo $map->visualiser();
$user = '';
while ($user != 'stop') {
    $posY = $map->getPosYHero();
    $posX = $map->getPosXHero();
    $error = '';
    $user = readline('Dans quelle direction veux-tu aller : ');
    switch ($user) {
        case 'gauche':
            if ($posX == 0) {
                goto obstacle;
            }
            $map->moveHero($posY, $posX - 1);
            break;

        case 'haut':
            if ($posY == 0) {
                goto obstacle;
            }
            $map->moveHero($posY - 1, $posX);
            break;

        case 'droite':
            if ($posX == $map->getLongueur() - 1) {
                goto obstacle;
            }
            $map->moveHero($posY, $posX + 1);
            break;

        case 'bas':
            if ($posY == $map->getHauteur() - 1) {
                goto obstacle;
            }
            $map->moveHero($posY + 1, $posX);
            break;

        case 'stop':
            break;

        case '':
            obstacle:
            $error = Couleurs::RED . 'erreur : impossible d\'avancer.' . Couleurs::RESET . PHP_EOL;
            break;

        default:
            $error = Couleurs::RED . 'erreur : mauvaise commande.' . Couleurs::RESET . PHP_EOL;
            break;
    }
    echo $map->visualiser();
    echo $error;
}
