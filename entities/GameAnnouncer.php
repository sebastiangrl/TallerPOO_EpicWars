<?php

namespace entities;

class GameAnnouncer {

    public static function presentCharacter(\entities\Character $character){
        echo "<br>".$character->getName()." se ha unido al mundo</br>";
        echo $character->getName()." es un ".$character->getRace()::getRaceName()." Nivel: ".$character->getLevel()."</br>";
        echo "Las estadísticas de ".$character->getName()." son:</br>";
        echo "HP Max: ".$character->getMaxHealtPoints()."</br>";
        echo "Str: ".$character->getStr()."</br>";
        echo "Intl: ".$character->getIntl()."</br>";
        echo "Agi: ".$character->getAgi()."</br>";
        echo "PDef: ".$character->getPDef()."</br>";
        echo "MDef: ".$character->getMDef()."</br>";
    }

    public static function statsCharacter(\entities\Character $character){

        echo "<br>".$character->getName()." es un ".$character->getRace()::getRaceName()." Nivel: ".$character->getLevel()."</br>";
        echo "Las estadísticas de ".$character->getName()." son:</br>";
        echo "HP: ".$character->getHealtPoints()."</br>";
        echo "Str: ".$character->getStr()."</br>";
        echo "Intl: ".$character->getIntl()."</br>";
        echo "Agi: ".$character->getAgi()."</br>";
        echo "PDef: ".$character->getPDef()."</br>";
        echo "MDef: ".$character->getMDef()."</br>";
    }
}