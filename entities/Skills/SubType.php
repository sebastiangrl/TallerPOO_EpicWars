<?php 

namespace entities\Skills;

class SubType {

    private $name;
    private $description;

    public function __construct(string $name, string $description){
        $this->name = $name;
        $this->description = $description;
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
}