<?php

namespace App\Controller;

abstract class BaseController
{
    private $templateFile = './Views/template.php';
    private $viewsDir = './Views/Frontend/';
    protected $params;

    public function __construct(string $action, array $params = [], string $method = 'get')
    {
        $this->params = $params;

        $method = strtolower($method) . ucfirst($action);
        if (is_callable([$this, $method])) {
            $this->$method();
        }
    }

    public function render(string $template, array $arguments, string $title)
    {
        $view = $this->viewsDir . $template;

        foreach ($arguments as $key => $value) {
            ${$key} = $value;
        }


        ob_start();
        require $view;
        $content = ob_get_clean();
        require $this->templateFile;
        exit;

    }
}   