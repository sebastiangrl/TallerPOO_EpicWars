<?php

//Creación de las skills de ataque 
$GolpeArma = \entities\Managers\SkillManager::createSkillDamage("Golpe con Arma","El personaje ataca inflingiendo el 100% del daño de arma 
    si esta es de mano derecha o dos manos, pero de ser de mano izquierda inflingirá 70%","Físico","Básico",1);
$GolpeTrampero = \entities\Managers\SkillManager::createSkillDamage("Golpe Trampero","El personaje distrae a su oponente con un movimiento
    malintencionado asestando un golpe con arma que inflije 150% de daño con ambas armas","Físico","Picaro",1.50);
$TajoMortal = \entities\Managers\SkillManager::createSkillDamage("Tajo Mortal","El personaje salta con intenciones despiadadas y raja 
    a su enemigo inflingiendo 200% de daño con armas.","Físico","Guerrero",2);
$Calcinacion = \entities\Managers\SkillManager::createSkillDamage("Calcinación","El personaje invoca el poder arcano y el elemento
  del fuego para quemar a su enemigo inflingiendo 40% de su intelecto como daño mágico.","Mágico","Mago",1.40);


//Creación de los buffs, se debe tener en cuenta el siguiente orden (str - intl - agi - PDef - MDef - HP)
$Meditacion = \entities\Managers\SkillManager::createSkillBuff("Meditación","El personaje medita un momento incrementando
 su agilidad e intelecto en 5%.","Mágico","Básico","1,1.05,1.05,1,1,1");
$TacticasCombate = \entities\Managers\SkillManager::createSkillBuff("Tacticas de Combate","El personaje repasa el campo de batalla preparando
 su siguiente golpe, esto incrementa su fuerza y agilidad en un 5%.","Físico","Avanzado","1.05,1,1.05,1,1,1");


//Creación de todas las armas
//Mano Derecha = 1 - Mano Izquierda = 2 - Dos Manos = 3
$HeavySword = \entities\Managers\WeaponManager::createWeapon("Excalibur","Físico", 60 );
$Sword = \entities\Managers\WeaponManager::createWeapon("Tizona","Físico", 40 );
$Dagger = \entities\Managers\WeaponManager::createWeapon("Dagger","Físico", 30 );
$Staff = \entities\Managers\WeaponManager::createWeapon("Staff","Mágico", 50 );
$Book = \entities\Managers\WeaponManager::createWeapon("Book","Mágico", 0 );
