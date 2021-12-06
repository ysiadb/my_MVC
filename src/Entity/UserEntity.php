<?php 

namespace App\Entity; 

class User {
    private $id; 
    private $firstname; 
    private $lastname; 
    private $email; 
    private $password; 


    public function getId(){
        return $this->id; 
    }
    
    public function setId(int $id){
        $this->id = $id;
    }

    public function getFirstname(){
        return $this->firstname; 
    }
    
    public function setFirstname(string $firstname){
        $this->firstname = $firstname;
    }

    public function getLastname(){
        return $this->lastname; 
    }
    
    public function setLastname(string $lastname){
        $this->lastname = $lastname;
    }

    public function getEmail(){
        return $this->email; 
    }
    
    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password; 
    }
    
    public function setPassword(string $password){
        $this->password = $password;
    }    

    public function getAdmin(){
        return $this->admin;
    }    

    public function setAdmin(string $admin){
        $this->admin = $admin;
    }

   
}