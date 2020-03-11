<?php 

namespace entities\Skills;

class SkillDamage extends skill {

    private $damage;
    
    public function __construct($name, $description, $type, $damage){
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->damage = $damage;
    }
    
    /**
     * Get the value of damage
     */ 
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Set the value of damage
     *
     * @return  self
     */ 
    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }
}