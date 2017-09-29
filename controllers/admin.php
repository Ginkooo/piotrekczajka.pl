<?php

require_once dirname(__DIR__) . '/core/utils/HttpResponse.php';
require_once dirname(__DIR__) . '/core/auth.php';

class Admin
{
    public function __construct()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $logged = Auth::login($username, $password);

        if (!$logged) {
            die('You have to log in to access admin page');
        }
    }

    public function index($params)
    {
        echo 'Eligible to access admin controller';
    }
}
