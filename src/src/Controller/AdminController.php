<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

class AdminController extends BaseController
{
    public function getIndex()
    {
        $this->render(
            'home.php',
            [
            ],
            'Home page'
        );
    }


}