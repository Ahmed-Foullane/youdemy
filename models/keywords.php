<?php
abstract class KeyWords 
{
    protected int $id = 0;
    protected string $name;


    public function __construct($name){
        $this->name = $name;
    }

    public function setID(int $id): void 
    {
        $this->id = $id;
    }

    public function setName(string $name): void 
    {
        $this->name = $name;
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string 
    {
        return $this->name;
    }
 
    public function __toString(): string
    {
        return "id: " .$this->id. " , name: " .$this->name. " .";
    }
}
