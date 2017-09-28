<?php
/**
 * Main file supposed to encapsulate request in a object and send it further
 */

class Request {
    public function __construct($controller, $action, $params) {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }
}

function asureOnlyLetters($string)
{
    $match = preg_match('/^[a-z]*[A-Z]*$/', $string);
    if (!$match) {
        http_response_code(404);
        die('Bad url'); // TODO: Make this some kind of 404
    }
    return $string;
}

function getRequest()
{
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    $controller = asureOnlyLetters($controller);
    $action = asureOnlyLetters($action);
    $params = $_REQUEST;

    $request = new Request($controller, $action, $params);
    return $request;
}

function forwardRequest($request) {
    $path = dirname(__DIR__) . '/controllers/' . $request->controller . '.php';
    if (!file_exists($path)) {
        die('Bad url');
    }
    include_once $path;
    $controller = new $request->controller;
    call_user_func_array([$controller, $request->action], [$request->params]);
}

session_start();
$request = getRequest();
forwardRequest($request);
