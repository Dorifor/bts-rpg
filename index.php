<?php

use App\Map;
use App\Utilitaires\Couleurs;
use App\Utilitaires\Utils;

require 'vendor/autoload.php';

Utils::effacerEcran();

$map = Map::__constructFile('map2');
echo $map->visualiser();
$user = '';
while ($user != 'stop') {
    $posY = $map->getPosYHero();
    $posX = $map->getPosXHero();
    $error = '';
    $user = readline('Dans quelle direction veux-tu aller : ');
    switch ($user) {
        case 'gauche':
            if ($posX == 0 || $map->isObstacle($posY, $posX - 1)) {
                goto obstacle;
            }
            $map->moveHero($posY, $posX - 1);
            break;

        case 'haut':
            if ($posY == 0 || $map->isObstacle($posY - 1, $posX)) {
                goto obstacle;
            }
            $map->moveHero($posY - 1, $posX);
            break;

        case 'droite':
            if ($posX == $map->getLongueur() - 1 || $map->isObstacle($posY, $posX + 1)) {
                goto obstacle;
            }
            $map->moveHero($posY, $posX + 1);
            break;

        case 'bas':
            if ($posY == $map->getHauteur() - 1 || $map->isObstacle($posY + 1, $posX)) {
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
