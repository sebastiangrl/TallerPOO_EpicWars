<?php 

namespace entities\Skills;

class Type {

    private $name;
    private $description;
    private $subtype;

    public function __construct($name, $description, $subtype){
        $this->name = $name;
        $this->description = $description;
        $this->subtype = $subtype;
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
    public function getSubType()
    {
        return $this->subtype;
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
    public function setSubType($type)
    {
        $this->type = $type;

        return $this;
    }
}