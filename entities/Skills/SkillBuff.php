<?php 

namespace entities\Skills;

class SkillBuff extends skill{

    private $stats;
    
    public function __construct($name, $description, $type, $stats){
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->stats = $stats;
    }

//CREAR CLASES DAMAGE Y BUFF QUE EXTIENDAN DE SKILL, BUFF UN ATRIBUTO QUE POTENCIE ATRIBUTOS
    //Getts n Setts

    /**
     * Get the value of stats
     */ 
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Set the value of stats
     *
     * @return  self
     */ 
    public function setStats($stats)
    {
        $this->stats = $stats;

        return $this;
    }
}