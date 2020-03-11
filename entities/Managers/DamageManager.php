<?php

namespace entities\Managers;

class DamageManager {

    public static function die (\entities\Character $character){
        echo $character->getName()." murio en combate<br>";
    }

    public static function revive (\entities\Character $character){
       $character->setHealtPoints(($character->getHealtPoints + 1) * 1.10);
       echo $character->getName()." revivio con ".$character->getHealtPoints()." puntos de salud<br>";
    }

    public static function attack (\entities\Character $character, \entities\Skills\SkillDamage $skill, \entities\Character $opponent ){

        //Para saber si el jugador tiene esa habilidad 
        if (in_array($skill->getName(), $character->getSkillsLearned())){

            self::DamagexSkill($character, $skill);//Llamamos la funcion que calcula el daño de la skill

            //Si la habilidad es de tipo Físico entonces aumentara el daño 2% por cada 10 de Str sino sera por el Intl
            if($skill->getType()->getName() == "Físico"){
                $damage = self::DamagexStr($character);
            } else {
                $damage = self::DamagexIntl($character);
            }

            //Si la habilidad es de tipo Físico entonces reducira el daño 1% por cada 10 de PDef sino sera por el MDef
            if($skill->getType()->getName() == "Físico"){
                $damage = self::PDefence($character,$damage);
            } else {
                $damage = self::MDefence($character, $damage);
            }

        //Daño critico
        $damage = self::DamageCritical($character, $damage);
        
        self::takeDamage($opponent, $damage);//Llamamos la funcion takeDamage para reducir los HP del oponente
        echo "<br>".$character->getName()." infringio ".$damage." de daño a ".$opponent->getName()."<br>";

        \entities\GameAnnouncer::statsCharacter($opponent);
        return $opponent;
        } else {
            echo "<br>No puedes atacar, ya que no tienes esa habilidad aprendida!<br>";
        }
    }


    public static function takeDamage (\entities\Character $character, $damage){

        $character->setHealtPoints($character->getHealtPoints() - $damage);

        if($character->getHealtPoints() <= 0){
            self::die($character);
        }
        
    }

    public static function buff (\entities\Character $character, \entities\Skills\SkillBuff $skill){

        $array = explode(",", $skill->getStats()); //Recibimos el array de string y lo separamos por la ","

        /*Multiplicamos cada stat del personaje con los stats de la skill para aumentar por porcentaje.
         El orden del arreglo es Str[0] - Intl[1] - Agi[2] - PDef[3] - MDef[4] - HP[5]*/
        $character->setStr($character->getStr() * $array[0]);
        $character->setIntl($character->getIntl() * $array[1]);
        $character->setAgi($character->getAgi() * $array[2]);
        $character->setPDef($character->getPDef() * $array[3]);
        $character->setMDef($character->getMDef() * $array[4]);
        $character->setMaxHealtPoints($character->getMaxHealtPoints() * $array[5]);

        echo "<br>".$character->getName(). " uso el buff ".$skill->getName()."<br>";
        \entities\GameAnnouncer::statsCharacter($character);
        return $character;

    }


    //Funciones para calcular el daño dependiendo de los stats
    private static function  DamagexStr(\entities\Character $character){
        $i=10;
        while($i <= $character->getStr()){
            if($i % 10 == 0){
                $damage = $character->getWeapon()->getDamage() * 1.02;
            }
            $i += 10;
        }
        return $damage;
    }

    private static function  DamagexIntl(\entities\Character $character){
        $i=10;
        while($i <= $character->getIntl()){
            if($i % 10 == 0){
                $damage = $character->getWeapon()->getDamage() * 1.02;
            }
            $i += 10;
        }
        return $damage;
    }

    //Funcion para calcular el daño critico
    private static function DamageCritical(\entities\Character $character, $damage){
        $i=10;
        while($i <= $character->getAgi()){
            if($i % 10 == 0){
                $crit = BASE_CRIT * 1.01;//Por cada 10 puntos de agilidad aumenta el critico un 1%.
            }
            $i += 10;
        }
        if($crit > rand() % 100){
            $damage = $damage * 1.50; //El daño aumenta un 150%
        }
        return $damage;
    }

     //Funciones para calcular la reducción del daño dependiendo de los stats
     private static function  PDefence(\entities\Character $character, $damage){
        $i=10;
        while($i <= $character->getPDef()){
            if($i % 10 == 0){
                $damage = $damage * 0.99;
            }
            $i += 10;
        }
        return $damage;
    }

    private static function  MDefence(\entities\Character $character, $damage){
        $i=10;
        while($i <= $character->getMDef()){
            if($i % 10 == 0){
                $damage = $damage * 0.99;
            }
            $i += 10;
        }
        return $damage;
    }

    //Funcion que multiplica el daño del arma con el porcentaje que aumenta la skill
    private static function DamagexSkill(\entities\Character $character, \entities\Skills\SkillDamage $Skill){
        $character->getWeapon()->setDamage($character->getWeapon()->getDamage() * $Skill->getDamage());
    }

}