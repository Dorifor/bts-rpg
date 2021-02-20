<?php

use App\Map;
use App\Utilitaires\Utils;

require 'vendor/autoload.php';

Utils::effacerEcran();

$map = new Map(10, 10);
echo $map->visualiser();
