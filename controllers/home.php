<?php

require_once dirname(__DIR__) . '/core/utils/HttpResponse.php';

class Home
{
    public function index($params)
    {
        $context = [
        'piesek' => 'kotek'
        ];
        return new HttpResponse('home/index', $context);
    }
}
