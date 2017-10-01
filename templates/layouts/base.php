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


require_once __DIR__ . '/../../core/utils/Helpers.php'; ?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script
                      src="https://code.jquery.com/jquery-3.2.1.min.js"
                      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                      crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <link href="css/styles.css" type="text/css" rel="stylesheet" >

    </head>
    <body class="container-fluid">
        <div class="container-fluid" id="heading">
            <div class="col-xs-11 text-center">
                <h1>piotrekczajka.pl</h1>
                <h5>Programowanie i nie tylko</h5>
            </div>
            <div class="col-xs-1">
                <a href="<?php Helpers::echoLinkTo('auth', 'login'); ?>" class="btn btn-default">
                    Zaloguj
                </a>
            </div>
        </div>
        <div class="navbar">
        </div>
        <div id="main-content">
            <?php require_once $content; ?>
        </div>
        <footer class="footer">
              <div class="container">
                    <span class="text-muted">Everything here is free, and GPLv3 licenced @copyright Piotr Czajka 2017</span>
              </div>
        </footer>
<body>
</html>
