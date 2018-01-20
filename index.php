<?php
/*
 * Scott Medlock
 * 1-19-2018
 * index page for this dating project.
 */


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
}
);

//Run Fat-Free
$f3->run();