<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;
use App\Model\authorManager as ModelAuthorManager;

class SecurityController extends BaseController
{

    public function executeIndex()
    {


        $authors = new ModelAuthorManager(PDOFactory::getMysqlConnection());

        $this->render(
            'login.php',
            [],
            'Home page'
        );

    }

    public function login($login, $mdp)
    {
        $authors = new ModelAuthorManager(PDOFactory::getMysqlConnection());

        $_SESSION["isAuthor"] = ModelAuthorManager::userExist($login, $mdp);
        $_SESSION["isAdmin"] = ModelAuthorManager::isAdmin($login, $mdp);
    }
}