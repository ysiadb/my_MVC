<?php

namespace PDOFactory;
class PDOFactory
{
    public static function getConnection()
    {
        try {
            return new PDO('mysql:host=db;dbname=my_mvc', 'root', 'example');
        } catch (PDOException $e) {
            print "Erreur /!\ : " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
