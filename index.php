<?php

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {
    $view = new View;
    echo $view->render('pages/home.html');
});

$f3->route('GET /personal-info', function() {
    $view = new View;
    echo $view->render('pages/personal-info.html');
});

//Run Fat-Free
$f3->run();