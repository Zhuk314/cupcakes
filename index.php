<?php

//This is the controller for the cupcakes project

//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validation.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET|POST /', function($f3){

    //Reinitialize session array
    $_SESSION = array();

    $userCups = array();

    //Get the data from the model
    $f3->set('cupcakes', getFlavors());

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Validate Name
        if (validName($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];
        } else {
            $f3->set('errors["name"]', 'Invalid name');
        }

        // Valid cupcake flavors
        $userCups = $_POST['cups'];

        if (validFlavor($userCups)) {
            //$_SESSION['cups'] = $userCups;
            $cupcakes = getFlavors();
            $_SESSION['cups'] = array();

            foreach ($userCups as $cup){
                array_push($_SESSION['cups'], $cupcakes[$cup]);
                var_dump($_SESSION['cups']);
            }
        } else {
            $f3->set('errors["cups"]', 'Invalid name');
        }

        // If no errors, display the summary page
        if (empty($f3->get('errors'))) {
            header('location: summary');
        }
    }

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define the route for summary page
$f3->route('GET|POST /summary', function($f3){


    //Display the summary page
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();