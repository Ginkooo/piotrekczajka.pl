<?php

require_once dirname(__DIR__) . '/core/utils/HttpResponse.php';

/**
 * Class: Home
 * Contains methods viewig homepage-related things
 *
 */
class Home
{
    /**
     * Shows homepage
     *
     * @param array $params params passed
     *
     * @return HttpResponse
     */
    public function index($params)
    {
        $context = [
        'categories' => ['category 1', 'category 2', 'category 3']
        ];
        return new HttpResponse('home/index', $context);
    }
}
