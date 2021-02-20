<?php

namespace App;

use App\Utilitaires\Titre;
use App\Utilitaires\Couleurs;

class Map
{
    const POSITION_VIDE = "-";
    const POSITION_HERO = Couleurs::GREEN . "H" . Couleurs::RESET;
    const POSITION_OBSTACLE = Couleurs::YELLOW . "O" . Couleurs::RESET;
    const POSITION_PERSONNAGE = "P";

    const SEPARATEUR = Couleurs::DARK_GRAY .  " | " . Couleurs::RESET;

    protected $longueur;
    protected $hauteur;

    protected $map;

    public function __construct($longueur, $hauteur)
    {
        $this->longueur = ($longueur > 0) ? $longueur : 10;
        $this->hauteur = ($hauteur > 0) ? $hauteur : 10;
    }

    public function visualiser(): string
    {
        $final = $this->genererInformations();
        $final .= $this->genererMap();
        return $final;
    }

    public function genererInformations(): string
    {
        $infos = Titre::createTitle('informations', $this->longueur * 4, '-', Couleurs::RED, Couleurs::YELLOW);
        $infos .= Couleurs::PURPLE . 'Dimensions' . Couleurs::RESET . ' : (' . Couleurs::GREEN . $this->hauteur . Couleurs::RESET . ', ' . Couleurs::GREEN . $this->longueur . Couleurs::RESET . ')' . PHP_EOL;
        $infos .= Couleurs::PURPLE . 'Vide' . Couleurs::RESET . ' : ' . Couleurs::YELLOW . self::POSITION_VIDE . PHP_EOL;
        $infos .= Couleurs::PURPLE . 'Obstacle' . Couleurs::RESET . ' : ' . Couleurs::YELLOW . self::POSITION_OBSTACLE . PHP_EOL;
        $infos .= Couleurs::PURPLE . 'Personnage' . Couleurs::RESET . ' : ' . Couleurs::YELLOW . self::POSITION_PERSONNAGE . PHP_EOL;
        return $infos;
    }

    public function genererMap(): string
    {
        // Create Title
        $map = Titre::createTitle('map', $this->longueur * 4, '-', Couleurs::RED, Couleurs::YELLOW);
        $map .= str_repeat(' ', 2);
        for ($i = 0; $i < $this->longueur; $i++) {
            $map .= Couleurs::BLUE . sprintf('  %02d', $i) . Couleurs::RESET;
        }
        $map .= PHP_EOL;

        $nextMap = $this->genererMapArray();

        for ($y = 0; $y < $this->hauteur; $y++) {
            $map .= $this->genererLigneMatrice($y, $nextMap);
        }
        return $map;
    }

    public function genererLigneMatrice(int $numeroLigne, array $mapMatrice): string
    {
        $ligne = "";
        $ligne .= Couleurs::BLUE . sprintf('%02d', $numeroLigne) . Couleurs::RESET;
        for ($x = 0; $x < $this->longueur; $x++) {
            $ligne .= self::SEPARATEUR . $mapMatrice[$numeroLigne][$x];
        }
        $ligne .= self::SEPARATEUR . PHP_EOL;
        return $ligne;
    }

    public function genererMapArray(): array
    {
        $mat = array();
        for ($y = 0; $y < $this->hauteur; $y++) {
            $ligne = array();
            for ($x = 0; $x < $this->longueur; $x++) {
                array_push($ligne, self::POSITION_VIDE);
            }
            array_push($mat, $ligne);
        }
        $mat[$this->posYHero][$this->posXHero] = self::POSITION_HERO;
        return $mat;
    }

    public function getLongueur()
    {
        return $this->longueur;
    }

    public function getHauteur()
    {
        return $this->hauteur;
    }
}
