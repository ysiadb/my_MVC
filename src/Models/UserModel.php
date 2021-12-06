<?php

namespace App\Manager;
use App\Entity\User;
use App\Model\BaseModel;
class userModel extends BaseModel
{
    public function getAllUsers()
    {
        $req = "SELECT * FROM user"; 
        $result = $this->bdd->query($req); 
        return $result;
    }

    public function getUserById(int $id)
    {
        $req = "SELECT * FROM user where id=:id"; 
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);  
        return $result->execute();
    }

    public function updateAuthor(User $user)
    {
        $req = "UPDATE `user` SET `firstname`=':firstname',`lastname`=':lastname',`email`=':email',`admin`=:admin,`password`=':password' WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
        $result->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);
        $result->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $result->bindValue(':admin', $user->getAdmin(), PDO::PARAM_INT);
        $result->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $result->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        return $result->execute();
    }

    public function addUser(User $user)
    {
        $req="INSERT INTO `user`(`firstname`, `lastname`, `email`, `admin`, `password`) VALUES (:firstname,:lastname,:email,:admin,:password)";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
        $result->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);
        $result->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $result->bindValue(':admin', $user->getAdmin(), PDO::PARAM_INT);
        $result->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $result->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        return $result->execute();
    }

    public function deleteUser(int $id)
    {
        $req = "DELETE FROM `user` WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT); 
        return $result->execute(); 
    }
}


