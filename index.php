<?php

//This is the controller for the cupcakes project

//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function($f3){

    //Get the data from the model
    $f3->set('cupcakes', getFlavors());

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

