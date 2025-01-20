<?php


include_once 'keywords.php';

class Tag extends KeyWords
{
    public function __construct($name)
    {
        parent::__construct($name);
    }
  
  
    public function __toString()
    {
        return parent::__toString();
    }
}