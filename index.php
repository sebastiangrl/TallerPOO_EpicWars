<?php

require './config.php';
require './resources.php';

$human = \entities\Managers\CharacterManager::create("Gerald",1,1,\entities\Races\Human::class,1);
$orc = \entities\Managers\CharacterManager::create("Garrosh",1,1,\entities\Races\Orc::class,2);
$elf = \entities\Managers\CharacterManager::create("Kael'Thas",1,1,\entities\Races\Orc::class,1);
$dwarf = \entities\Managers\CharacterManager::create("Muradin",1,1,\entities\Races\Orc::class,3);

$human = \entities\Managers\LevelManager::levelUp($human,10);
$orc = \entities\Managers\LevelManager::levelUp($orc,8);
$elf = \entities\Managers\LevelManager::levelUp($elf,15);
$dwarf = \entities\Managers\LevelManager::levelUp($dwarf,9);

\entities\Managers\SkillManager::learnSkill($human,$GolpeArma);
\entities\Managers\SkillManager::learnSkill($human,null,$Meditacion);
\entities\Managers\SkillManager::learnSkill($human,null,$TacticasCombate);
\entities\Managers\SkillManager::learnSkill($human,$Calcinacion);

\entities\Managers\SkillManager::learnSkill($orc,$GolpeArma);
\entities\Managers\SkillManager::learnSkill($orc,$TajoMortal);
\entities\Managers\SkillManager::learnSkill($orc,null,$TacticasCombate);

\entities\Managers\SkillManager::learnSkill($elf,$GolpeArma);
\entities\Managers\SkillManager::learnSkill($elf,null,$Meditacion);
\entities\Managers\SkillManager::learnSkill($elf,$Calcinacion);

\entities\Managers\SkillManager::learnSkill($dwarf,$GolpeArma);
\entities\Managers\SkillManager::learnSkill($dwarf,$GolpeTrampero);
\entities\Managers\SkillManager::learnSkill($dwarf,null,$Meditacion);

\entities\Managers\SkillManager::forgetSkill($human,$Meditacion);

\entities\Managers\WeaponManager::equipWeapon($human, $Staff);
\entities\Managers\DamageManager::buff($orc,$TacticasCombate);
\entities\Managers\DamageManager::attack($human,$GolpeArma,$orc);
