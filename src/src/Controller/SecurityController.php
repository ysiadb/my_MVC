<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

class SecurityController extends BaseController
{

    public function executeIndex()
    {
        $authors = new AuthorManager(PDOFactory::getMysqlConnection());

        $this->render(
            'login.php',
            [],
            'Login page'
        );

    }

    public function executeLogin($login, $mdp)
    {
        $authors = new AuthorManager(PDOFactory::getMysqlConnection());
        $this->render(
            'login.php',
            [],
            'Login page'
        );

        $_SESSION["isAuthor"] = AuthorManager::userExist($login, $mdp);
        $_SESSION["isAdmin"] = AuthorManager::isAdmin($login, $mdp);
        var_dump($_SESSION["isAuthor"], "IS AUTHOR"); 
    }

    
}