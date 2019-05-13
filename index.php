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

$f3->route('GET|POST /survey', function ($f3){

    $options = array('This midterm is easy', 'I like midterms', 'Detective Pikachu was great!');
    $f3->set('options', $options);

    if(!empty($_POST)){

        $name = $_POST['name'];
        $selections = $_POST['options'];

        $f3->set('name', $name);
        $f3->set('selections', $selections);

        $_SESSION['name'] = $f3->get('name');
        $_SESSION['selections'] = implode(", " ,$f3->get('selections'));

        $f3->reroute('/summary');
    }

    $view = new Template();
    echo $view->render('views/form1.html');
});

$f3->route('GET|POST /summary', function (){

    $view = new Template();
    echo $view->render('views/results.html');
});

$f3->run();