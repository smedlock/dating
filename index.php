<?php

//Require the autoload file
require_once('vendor/autoload.php');

//Start the session
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {
    $template = new Template;
    echo $template->render('pages/home.html');
});

$f3->route('GET /personal-info', function() {
    $template = new Template;
    echo $template->render('pages/personal-info.html');
});

$f3->route('POST /create-profile', function() {
    $template = new Template;
    echo $template->render('pages/create-profile.html');
});

$f3->route('POST /interests', function() {
    $template = new Template;
    echo $template->render('pages/interests.html');
});

//Run Fat-Free
$f3->run();