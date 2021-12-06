<?php 

namespace App\Model;

abstract class BaseModel {
    protected $pdo; 
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}