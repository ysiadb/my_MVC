<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;
use App\Manager\PostManager;
class SecurityController extends BaseController
{
    public function getRegister()
    {
        $this->render(
            'register.php',
            [],
            'Register page'
        );
    }

    public function postRegister()
    {
        /** @var AuthorManager $authors */
        $authors = AuthorManager::getInstance();

        $firstname = $_POST["firstname"] ?? NULL;
        $lastname = $_POST["lastname"] ?? NULL;
        $pseudo = $_POST["pseudo"] ?? NULL;
        $email = $_POST["email"] ?? NULL;
        $pw = $_POST["pw"] ?? NULL;

        if(!empty($_POST['admin'])) {
            $admin = 1;
        }
        else {
            $admin = 0;
        }

        $authors->addAuthor($firstname, $lastname, $pseudo, $email, $admin, $pw);

        $_SESSION["isAuthor"] = 1;
        $_SESSION["isAdmin"] = $authors->isAdmin($pseudo, $pw);
        header('Location:/');
    }

    public function getLogin()
    {
        $this->render(
            'login.php',
            [],
            'Login page'
        );
    }

    public function postLogin()
    {
        /** @var AuthorManager $authorManager */
        $authors = AuthorManager::getInstance();
        $_SESSION["isAuthor"] = $authors->userExist($_POST["pseudo"], $_POST["password"]);
        $_SESSION["isAdmin"] = $authors->isAdmin($_POST["pseudo"], $_POST["password"]);
        header('Location:/');
        exit;
    }

    public function getLogout()
    {
        unset($_SESSION['isAuthor']);
        unset($_SESSION['isAdmin']);
        header('Location:/');
        exit;
    }

}