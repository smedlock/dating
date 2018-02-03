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

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['biography'] = $_POST['biography'];
    $template = new Template;
    echo $template->render('pages/interests.html');
});

$f3->route('POST /profile-summary', function($f3) {

    $template = new Template;
    if ($_POST['submit']) {
        $isValid = true;
        include('model/validate.php');

        //variables for sticky
        $indoor = $_POST['indoor'];
        $outdoor = $_POST['outdoor'];
        $f3->set('indoor', $indoor);
        $f3->set('outdoor', $outdoor);

        // validate form variables
        if (validIndoor($indoor)) {
            $f3->clear('invalidIndoor');
        } else {
            $f3->set('invalidIndoor', 'invalid');
            $isValid = false;
        }

        if (validOutdoor($outdoor)) {
            $f3->clear('invalidOutdoor');
        } else {
            $f3->set('invalidOutdoor', 'invalid');
            $isValid = false;
        }

        // check for form validity
        if ($isValid) {
            $_SESSION['indoor'] = $_POST['indoor'];
            $_SESSION['outdoor'] = $_POST['outdoor'];
            $f3->set('firstName', $_SESSION['firstName']);
            $f3->set('lastName', $_SESSION['lastName']);
            $f3->set('gender', $_SESSION['gender']);
            $f3->set('age', $_SESSION['age']);
            $f3->set('phone', $_SESSION['phone']);
            $f3->set('email', $_SESSION['email']);
            $f3->set('state', $_SESSION['state']);
            $f3->set('seeking', $_SESSION['seeking']);
            $f3->set('biography', $_SESSION['biography']);
            echo $template->render('pages/profile-summary.html');
        } else {
            echo $template->render('pages/interests.html');
        }
    }
});

//Run Fat-Free
$f3->run();