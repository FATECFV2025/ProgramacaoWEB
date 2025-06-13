<?php

namespace src\Routes;

class Routes
{
    private $routes = [];

    public function add($method, $path, $action)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'action' => $action
        ];
    }

    public function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $fullpath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $basePath = "/aula10/public";
        $path = substr($fullpath, strlen($basePath));

        if ($path === false || $path === '') {
            $path = '/';
        }

        foreach ($this->routes as $r) {
            $routePath = preg_replace('/\{[^\}]+\}/', '([^/]+)', $r['path']);
            $routePath = str_replace('/', '\/', $routePath);
            if ($r['method'] == $method && preg_match('/^' . $routePath . '$/', $path, $matches)) {
                array_shift($matches);
                call_user_func_array($r['action'], $matches);
                return;
            }
        }
    }
}
