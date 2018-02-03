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

$f3->route('POST /create-profile', function($f3) {
    $template = new Template;
    if ($_POST['submit']) {
        $isValid = true;
        include('model/validate.php');

        //variables for sticky
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $f3->set('firstName', $firstName);
        $f3->set('lastName', $lastName);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('phone', $phone);

        // validate form variables
        if (validName($_POST['firstName'])) {
            $f3->clear('invalidFirstName');
        } else {
            $f3->set('invalidFirstName', 'invalid');
            $isValid = false;
        }

        if (validName($_POST['lastName'])) {
            $f3->clear('invalidLastName');
        } else {
            $f3->set('invalidLastName', 'invalid');
            $isValid = false;
        }

        if (validAge($_POST['age'])) {
            $f3->clear('invalidAge');
        } else {
            $f3->set('invalidAge', 'invalid');
            $isValid = false;
        }

        if (validPhone($_POST['phone'])) {
            $f3->clear('invalidPhone');
        } else {
            $f3->set('invalidPhone', 'invalid');
            $isValid = false;
        }

        // check for form validity
        if ($isValid) {
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
            $_SESSION['age'] = $_POST['age'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['phone'] = $_POST['phone'];
            echo $template->render('pages/create-profile.html');
        } else {
            echo $template->render('pages/personal-info.html');
        }
    } else {
        echo $template->render('pages/personal-info.html');
    }
});

$f3->route('POST /interests', function() {
    print_r($_POST);
    $template = new Template;
    echo $template->render('pages/interests.html');
});

$f3->route('POST /profile-summary', function() {
    print_r($_POST);
    $template = new Template;
    echo $template->render('pages/profile-summary.html');
});

//Run Fat-Free
$f3->run();