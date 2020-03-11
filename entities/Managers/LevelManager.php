<?php

namespace entities\Managers;

class LevelManager {

    private static $baseExp = 100;
    private static $maxLevel = 100;
    private static $minLevel = 1;

    public static function levelUp(\entities\Character $character, $number) {

            //Si el numero de niveles a subir es mayor o igual a 100 entonces sera tomado como 99
            if($number >= self::$maxLevel){
                $number = 99;
            }
    
            if($character->getLevel() < self::$maxLevel) {
                
                for ($i=0; $i < $number; $i++) {
                    $character->setStr($character->getStr() + 5);
                    $character->setAgi($character->getAgi() + 5);
                    $character->setIntl($character->getIntl() + 5);
                    $character->setPDef($character->getPDef() + 5);
                    $character->setMDef($character->getMDef() + 5);
                    $character->setMaxHealtPoints($character->getMaxHealtPoints() + 50);
                    $character->setLevel($character->getLevel() + 1);
                    self::$baseExp = self::$baseExp * 2;
    
                    if ($character->getLevel() == self::$maxLevel){break;} //Si el nivel 100 ya es alcanzado entonces se terminara el proceso
                }
                echo "<br>".$character->getName()." subio de nivel <br>";
             }   else {
                echo "<br> El nivel maximo es 100 <br>";
    
            }

            \entities\GameAnnouncer::statsCharacter($character);
            return $character;

    }

    
    public static function levelDown(\entities\Character $character, $number) {

        //Si el numero de niveles a restar es mayor o igual a 100 entonces sera tomado como 99
        if($number >= self::$minLevel){
            $number = 99;
        }

        if($character->getLevel() < self::$maxLevel) {
            
            for ($i=0; $i < $number; $i++) {
                $character->setStr($character->getStr() - 5);
                $character->setAgi($character->getAgi() - 5);
                $character->setIntl($character->getIntl() - 5);
                $character->setPDef($character->getPDef() - 5);
                $character->setMDef($character->getMDef() - 5);
                $character->setMaxHealtPoints($character->getMaxHealtPoints() - 50);
                $character->setLevel($character->getLevel() - 1);

                if ($character->getLevel() == self::$minLevel){break;} //Si el nivel 1 ya es alcanzado entonces se terminara el proceso
            }
            echo "<br>".$character->getName()." bajo de nivel <br>";
         }   else {
            echo "El nivel minimo es 1 <br>";

        }

        \entities\GameAnnouncer::statsCharacter($character);
        return $character;

        
    }

    public static function getExpForLevel() {

        
    }


}