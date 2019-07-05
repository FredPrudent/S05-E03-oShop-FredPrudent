<?php

// étape incontournable si je veux instancier mon controller
// il faut bien que PHP soit au courant de l'existence de la classe
require_once __DIR__."/../app/controllers/MainController.php";

// on instancie le controller
$controller = new MainController();

// on récupère l'url demandée par le visiteur à la base
$route = isset($_GET['_url']) ? $_GET['_url'] : '/';

switch ($route) {
    case '/':
        $controller->home();
        break;
    default:
        $controller->error();
        break;
}