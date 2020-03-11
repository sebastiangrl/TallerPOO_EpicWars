<?php 

namespace entities\Skills;

abstract class skill {

    protected $name;
    protected $description;
    protected $type;
    
    public function __construct($name, $description, $type){
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
    }

    //Getts n Setts

    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getType()
    {
        return $this->type;
    }

    
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    } 
    
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}