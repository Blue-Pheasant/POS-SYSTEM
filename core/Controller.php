<?php

namespace app\core;

use app\core\Application;
use app\middlewares\BaseMiddleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';
    public BaseMiddleware $middleware;
    public Cookie $cookie;

    
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middleware = $middleware;
        $this->middleware->execute();
    }

    public function registerCookie(Cookie $cookie)
    {
        $this->cookie = $cookie;
        $this->cookie->create();
    }

    public function destroyCookie(Cookie $cookie)
    {
        $this->cookie->destroy();
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}