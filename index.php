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

    //Get the data from the model
    $f3->set('cupcakes', getFlavors());

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Validate Name
        if (validName($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];
        } else {
            $f3->set('errors["name"]', 'Invalid name');
        }

        //Validate Cupcakes
        if (validFlavor($_POST['cups'])) {
            $_SESSION['cups'] = $_POST['cups'];
        } else {
            $f3->set('errors["cups"]', 'Invalid flavors');
        }

        if (empty($f3->get('errors'))) {
            header('location: summary');
        }
    }

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /home', function($f3){

    //Get the data from the model
    $f3->set('cupcakes', getFlavors());

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

//Run Fat-Free
$f3->run();