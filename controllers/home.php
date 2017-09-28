<?php

require_once dirname(__DIR__) . '/core/utils/HttpResponse.php';

class Home
{
    public function index($params)
    {
        $data = [
        'piesek' => 'kotek'
        ];
        return new HttpResponse('home/index', $data);
    }
}
