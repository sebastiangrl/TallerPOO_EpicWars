<?php

namespace entities\Managers;

class SkillManager {
    
        /**
         * Types: Mágico - Físico
         * SubTypes: Básico - Picaro - Guerrero - Mago - Avanzado 
        */
        
    public static function learnSkill (\entities\Character $character, \entities\Skills\SkillDamage $skillDamage = null, \entities\Skills\SkillBuff $skillBuff = null){

        //Si le pasamos una skill de daño entonces tomara los atributos de esta
        if($skillDamage != null){
            $skill = $skillDamage;
        } else if($skillBuff != null){ //Si le pasamos una skill de buff entonces tomara los atributos de esta
            $skill = $skillBuff;
        }
        
        //Clases: Mage=1 War=2 Rogue=3

        switch ($character->getPlayableClass()) {
            case 1:
                   /**
                     * Class Mage:
                     * Pueden aprender Skills de tipo:
                     * Mágicas, Físicas pero con subtipo Básico
                    */
                if ($skill->getType()->getName() == 'Mágico' || 
                    $skill->getType()->getName() == 'Físico' && $skill->getType()->getSubType()->getName() == 'Básico'){ 
                    $character->setSkillsLearned($skill->getName()); //Guardamos la skill en un array
                    echo "<br>".$character->getName() . " aprendio la habilidad " . $skill->getName() . "<br>";
                } else {
                    echo "La habilidad ".$skill->getName()." es de tipo ".$skill->getType()->getName()."/".
                    $skill->getType()->getSubType()->getName()." así que no la puedes aprender <br>";
                } 
            break;

            case 2:
                    /**
                     * Class War:
                     * Pueden aprender Skills de tipo:
                     * Físicas 
                     * Subtipo: Básico, Guerrero y Avanzado
                    */
                if ($skill->getType()->getName() == 'Físico' && $skill->getType()->getSubType()->getName() == 'Básico' ||
                    $skill->getType()->getName() == 'Físico' && $skill->getType()->getSubType()->getName() == 'Guerrero' ||
                    $skill->getType()->getName() == 'Físico' && $skill->getType()->getSubType()->getName() == 'Avanzado' ){ 
                    $character->setSkillsLearned($skill->getName()); //Guardamos la skill en un array
                    echo "<br>".$character->getName() . " aprendio la habilidad " . $skill->getName() . "<br>";
                } else {
                    echo "La habilidad ".$skill->getName()." es de tipo ".$skill->getType()->getName()."/".
                    $skill->getType()->getSubType()->getName()." así que no la puedes aprender <br>";
                }
            break;

            case 3:
                    /**
                     * Class Rogue:
                     * Pueden aprender Skills de tipo:
                     * Físicas y Mágicas pero con subtipo Básico
                     * Subtipo: Básico y Picaro
                     */
                if ($skill->getType()->getName() == 'Físico' && $skill->getType()->getSubType()->getName() == 'Básico' ||
                    $skill->getType()->getName() == 'Físico' && $skill->getType()->getSubType()->getName() == 'Picaro' ||
                    $skill->getType()->getName() == 'Mágico' && $skill->getType()->getSubType()->getName() == 'Básico' ){ 
                    $character->setSkillsLearned($skill->getName()); //Guardamos la skill en un array
                    echo "<br>".$character->getName() . " aprendio la habilidad " . $skill->getName() . "<br>";
                } else {
                    echo "<br>La habilidad ".$skill->getName()." es de tipo ".$skill->getType()->getName()."/".
                    $skill->getType()->getSubType()->getName()." así que no la puedes aprender <br>";
                }
            break;

            default:
                    echo "No tienes una clase valida<br>";

        }
    }


    public static function forgetSkill (\entities\Character $character, \entities\Skills\Skill $skill){

        //La funcion in_array permite saber si un elemento esta en el arreglo
        if (in_array($skill->getName(), $character->getSkillsLearned())){
            //La funcion array_search permite obtener la clave del elemento que queremos eliminar
            $clave = array_search($skill->getName(), $character->getSkillsLearned());

            for ($i=0; $i <= count($character->getSkillsLearned()); $i++){//Recorremos el arreglo
                if (in_array($skill->getName(), $character->getSkillsLearned())){//Si aun esta en el arreglo
                    $character->deleteElementArray($clave);//Lo eliminamos
                    echo "<br>".$character->getName()." olvido la habilidad ".$skill->getName()."<br>";
                    }
                }
            } else {
               echo "Esa habilidad no la has aprendido <br>";
            }
         print_r($character->getSkillsLearned()) . "<br>";   
    }
        

    public static function createSkillDamage($name, $description, $type, $subtype, $damage){

        //Skill(name, description, type) - Type(name, description, subtype) - SubType(name,description)
        $SkillDamage = new \entities\Skills\SkillDamage($name, $description, new \entities\Skills\Type($type,$description,
         new \entities\Skills\SubType($subtype, $description)), $damage);

        return $SkillDamage;
    }

    public static function createSkillBuff($name, $description, $type, $subtype, $stats){

        //Skill(name, description, type) - Type(name, description, subtype) - SubType(name,description)
        $SkillBuff = new \entities\Skills\SkillBuff($name, $description, new \entities\Skills\Type($type,$description,
         new \entities\Skills\SubType($subtype, $description)), $stats);

        return $SkillBuff;
    }
        
}