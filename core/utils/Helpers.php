<?php

/*
 * Copyright (C) 2017  Piotr Czajka <piotr_czajka@protonmail.com>
 * Author: Piotr Czajka <piotr_czajka@protonmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


/**
 * Class: Helpers
 * Set of utilities useful in templates, like generating urls
 *
 * @final
 */
final class Helpers
{
    /**
     * Takes controller, action and params and echoes correct link to that action
     *
     * @param string $controller controller to link to
     * @param string $action     action to link to
     * @param array  $params     other parameters to include in a link
     *
     * @return null, just echoes
     */
    public static function echoLinkTo($controller, $action, $params=[])
    {
        $queryString = '?';

        $params['controller'] = $controller;
        $params['actrion'] = $action;

        foreach ($params as $key=>$value) {
            $queryString .= $key . '=' . $value . '&';
        }

        $queryString = mb_substr($queryString, 0, mb_strlen($queryString) - 1);

        $fullUrl =  $queryString;
        echo $fullUrl;
    }
}
