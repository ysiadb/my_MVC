<?php
namespace App\Manager;
use App\Entity\Comment; 
use App\Entity\Post; 
use PDO; 

class CommentManager extends BaseManager
{
     /** @var CommentManager */
     protected $commentManager;
     
    /** @var AuthorManager */
    protected $authorManager;

     /** For dependency injection next step */
    public function __construct()
    {
        $this->authorManager = CommentManager::getInstance();
        parent::__construct();
    }

    function hydrate($args)
    {
        $p = new Post($args);
        $p->setAuthor($this->authorManager->getAuthorById($args['idauthor']));
        return $p;
    }
 
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

    public function updateComment($id, $texte, $idAuthor, $idPost, $date)
    {
        $req = "UPDATE `comment` SET `texte`=:texte, `idauthor`=:idauthor, `idpost`=:idpost, `date`=:date WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->bindValue(':texte', $texte, PDO::PARAM_STR);
        $result->bindValue(':idauthor', $idAuthor, PDO::PARAM_INT);
        $result->bindValue(':idpost', $idPost, PDO::PARAM_INT);
        $result->bindValue(':date', $date, PDO::PARAM_STR);
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

    public function addComment($texte, $idAuthor, $idPost, $date)
    {
        $req="INSERT INTO `post`(`texte`) VALUES (:texte)";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':texte', $texte, PDO::PARAM_STR);
        $result->bindValue(':idauthor', $idAuthor, PDO::PARAM_INT);
        $result->bindValue(':idpost', $idPost, PDO::PARAM_INT);
        $result->bindValue(':date', $date, PDO::PARAM_STR);
        return $result->execute();
    }
}