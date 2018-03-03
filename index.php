<?php

//Require the autoload file
require_once('vendor/autoload.php');
require_once("/home/smedlock/config.php");

//Start the session
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$database = new Database();

//Define a default route
$f3->route('GET /', function() {
    $template = new Template;
    echo $template->render('pages/home.html');
});

$f3->route('GET /admin', function() {
    $template = new Template;
    echo $template->render('pages/admin.html');
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
            if (isset($_POST['premium'])) {
                $newMember = new PremiumMember($firstName, $lastName, $age, $gender, $phone, "", "", "", "", array(), array());
            } else {
                $newMember = new Member($firstName, $lastName, $age, $gender, $phone, "", "", "", "");
            }
            $_SESSION['newMember'] = $newMember;

            echo $template->render('pages/create-profile.html');
        } else {
            echo $template->render('pages/personal-info.html');
        }
    } else {
        echo $template->render('pages/personal-info.html');
    }
});

$f3->route('POST /interests', function($f3) {

    $newMember = $_SESSION['newMember'];

    $newMember->setEmail($_POST['email']);
    $newMember->setState($_POST['state']);
    $newMember->setSeeking($_POST['seeking']);
    $newMember->setBio($_POST['biography']);

    $_SESSION['newMember'] = $newMember;

    if (get_class($newMember) == 'Member') {
        $f3->reroute('/profile-summary');
    }

    $template = new Template;
    echo $template->render('pages/interests.html');
});

$f3->route('GET|POST /profile-summary', function($f3) {

    $template = new Template;
    $newMember = $_SESSION['newMember'];
    $isValid = true;
    if ($_POST['submitInterests']) {
        include('model/validate.php');

        $newMember->setInDoorInterests($_POST['indoor']);
        $newMember->setOutDoorInterests($_POST['outdoor']);

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
    }

    // check for form validity
    if ($isValid) {

        // Initialize variables for fat free and database
        $fname = $newMember->getFname();
        $lname = $newMember->getLName();
        $age = $newMember->getAge();
        $gender = $newMember->getGender();
        $phone = $newMember->getPhone();
        $email = $newMember->getEmail();
        $state = $newMember->getState();
        $seeking = $newMember->getSeeking();
        $bio = $newMember->getBio();
        $image = '';
        $premium = 0;
        $interests = '';

        if (get_class($newMember) == "PremiumMember") {
            $premium = 1;
            $indoorInterests = $newMember->getInDoorInterests();
            $outdoorInterests = $newMember->getOutDoorInterests();
            $f3->set('indoor', $indoorInterests);
            $f3->set('outdoor', $outdoorInterests);
            if (isset($indoorInterests)) {
                foreach ($indoorInterests as $key => $indoorInterest) {
                    $interests .= $indoorInterest . ', ';
                }
            }
            if (isset($outdoorInterests)) {
                $interests .= $outdoorInterests[0];
                for ($i = 1; $i < sizeof($outdoorInterests); $i++) {
                    $interests .= ', ' . $outdoorInterests[$i];
                }
            }

        }

        $f3->set('firstName', $fname);
        $f3->set('lastName', $lname);
        $f3->set('gender', $gender);
        $f3->set('age', $age);
        $f3->set('phone', $phone);
        $f3->set('email', $email);
        $f3->set('state', $state);
        $f3->set('seeking', $seeking);
        $f3->set('biography', $bio);

        if (isset($_FILES['fileToUpload'])) {
            include('model/upload-image.php');
            $image = $_SESSION['profilePicture'];
        }

        //$fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio, $premium, $image, $interests
        global $database;
        $database->addRow($fname, $lname, $age, $gender, $phone, $email,
                    $state, $seeking, $bio, $premium, $image, $interests);

        echo $template->render('pages/profile-summary.html');
    } else {
        echo $template->render('pages/interests.html');
    }
});

//Run Fat-Free
$f3->run();