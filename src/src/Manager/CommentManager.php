<?php
namespace App\Model;

class commentManager extends BaseManager
{
    public function getAllComments()
    {
        $req = "SELECT * FROM comment";
        return $this->bdd->query($req);
    }

    public function getCommentById(int $id)
    {
        $req = "SELECT * FROM comment where id=:id"; 
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);  
        return $result->execute();
    }

    public function updateComment(Comment $comment)
    {
        $req = "UPDATE `comment` SET `texte`=:text WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':text', $comment->getTexte(), PDO::PARAM_STR);
        $result->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
        return $result->execute();
    }

    public function deleteComment(int $id)
    {
        $req = "DELETE FROM `comment` WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT); 
        return $result->execute(); 
    }

    public function getCommentsByPost(int $id)
    {
        $req = "SELECT * FROM comment where idpost=:id"; 
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);  
        return $result->execute();
    }

    public function addComment(\Comment $comment)
    {
        $req="INSERT INTO `post`(`texte`) VALUES (:texte)";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':texte', $comment->getTexte(), PDO::PARAM_STR);
        return $result->execute();
    }

}