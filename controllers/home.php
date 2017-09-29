<?php

require_once dirname(__DIR__) . '/core/utils/HttpResponse.php';

class Home
{
    public function index($params)
    {
        $context = [
        'posts' => ['post 1', 'post 2', 'post 3', 'post 4', 'post5']
        ];
        return new HttpResponse('home/index', $context);
    }
}
