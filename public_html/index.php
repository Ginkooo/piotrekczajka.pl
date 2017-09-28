<?php

class Request {
    public function __construct($controller, $action, $params) {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }
}

class RequestHandler
{
    private static function asureOnlyLetters($string)
    {
        $match = preg_match('/^[a-z]*[A-Z]*$/', $string);
        if (!$match) {
            throw new \InvalidArgumentException('Url contains illegal characters'); // TODO: Make this some kind of 404
        }
        return $string;
    }

    public static function getRequest()
    {
        $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'home';
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
        $controller = self::asureOnlyLetters($controller);
        $action = self::asureOnlyLetters($action);
        $params = $_REQUEST;

        $request = new Request($controller, $action, $params);
        return $request;
    }

    public static function forwardRequest($request)
    {
        $path = dirname(__DIR__) . '/controllers/' . $request->controller . '.php';
        if (!file_exists($path)) {
            throw new \RuntimeException("Controller file doesn't exist");
        }
        include_once $path;
        $controller = new $request->controller;
        call_user_func_array([$controller, $request->action], [$request->params]);
    }
}

session_start();
$request = RequestHandler::getRequest();
RequestHandler::forwardRequest($request);
