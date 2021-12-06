<?php 

namespace App\Model;
use PDOFactory;
class BaseModel {
    protected  $pdo; 
    
    public function __construct( $pdo)
    {
        $this->pdo = $pdo;
    }
}   