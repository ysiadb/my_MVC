<?php

namespace App\Entity;


use App\Entity\Entity;

use DateTime;
class Post extends Entity{

    private int $id;
    private string $titre;
    private string $texte;
    private string $image;
    private string $date;
    private int $idAuthor;
    private Author $author;

    /*
    public function __construct($id, $titre, $texte, $idAuthor)
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setTexte($texte);
        $this->setDate();
        $this->setIdAuthor($idAuthor);
    }
    */


    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }


    public function getIdAuthor(){
        return $this->idAuthor;
    }

    public function setIdAuthor(int $idAuthor){
        $this->idAuthor = $idAuthor;
    }

    public function setAuthor(Author $author){
        $this->author = $author;
        return $this;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function setTitre(string $titre){
        $this->titre = $titre;
    }
    public function getTexte(){
        return $this->texte;
    }

    public function setTexte(string $texte){
        $this->texte = $texte;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage(string $image){
        $this->image = $image;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }


}
