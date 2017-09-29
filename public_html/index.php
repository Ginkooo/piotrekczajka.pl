<?php
/**
 * Class: Request
 * encapsulates request in controller, action, params
 *
 */
class Request {
    /**
     * 
     *
     * @param mixed $controller controller which user wants to access
     * @param mixed $action     action, which user wants to access
     * @param mixed $params     other parametert provided in $_REQUEST
     */
    public function __construct($controller, $action, $params)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }
}

/**
 * Class: RequestHandler
 * uses Request class to encapsulate request and then forwards it.
 *
 */
class RequestHandler
{
    /**
     * Asures string contain letters only,
     * otherwise it throws exeption
     *
     * @param mixed $string string to check
     */
    private static function _asureOnlyLetters($string)
    {
        $match = preg_match('/^[a-z]*[A-Z]*$/', $string);
        if (!$match) {
            throw new \InvalidArgumentException('Url contains illegal characters'); // TODO: Make this some kind of 404
        }
        return $string;
    }

    /**
     * Enceptulates request in Request Class
     *
     * @return Request
     */
    public static function getRequest()
    {
        $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'home';
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
        $controller = self::_asureOnlyLetters($controller);
        $action = self::_asureOnlyLetters($action);
        $params = $_REQUEST;

        $request = new Request($controller, $action, $params);
        return $request;
    }

    /**
     * Check if controller script exists, instanciate it's class
     * and invokes right method
     *
     * @param Request $request Encaptulated request object
     *
     * @return void
     */
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
