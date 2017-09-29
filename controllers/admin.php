<?php

require_once dirname(__DIR__) . '/core/utils/HttpResponse.php';
require_once dirname(__DIR__) . '/core/auth.php';

/**
 * Class: Admin
 * Controller, which should be accessible only by admin users.
 * Contains all managment tools.
 *
 */
class Admin
{
    /**
     * Asures user accessing it is logged in
     */
    public function __construct()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $logged = Auth::login($username, $password);

        if (!$logged) {
            die('You have to log in to access admin page');
        }
    }

    /**
     * Shows admin home page
     *
     * @param array $params all passed parameters
     *
     * @return HttpResponse
     */
    public function index($params)
    {
        echo 'Eligible to access admin controller';
    }
}
