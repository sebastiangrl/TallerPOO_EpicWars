<?php

namespace entities\Managers;

class WeaponManager {

    public static function createWeapon($name,$type,$damage){
        $weapon = new \entities\Weapon($name,$type,$damage);
        return $weapon;
    }

    public static function equipWeapon(\entities\Character $character, \entities\Weapon $weapon, \entities\Weapon $weapon2 = null){
        $character->setWeapon($weapon, $weapon2);
        echo "<br>".$character->getName()." equipo el arma ".$weapon->getName()."<br>";
    }

}