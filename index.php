<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require ("vendor/autoload.php");

$f3 = Base::instance();

$f3->route('GET /', function (){

    //default route
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /survey', function (){



    //default route
    $view = new Template();
    echo $view->render('views/form1.html');
});

$f3->run();