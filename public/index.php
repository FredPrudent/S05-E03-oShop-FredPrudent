<?php

// étape 0 : à ne faire qu'une seule fois dans votre projet
// inclure le fichier autoload de Composer, qui se charge de charger toutes vos dépendances
require_once __DIR__."/../vendor/autoload.php";

// étape incontournable si je veux instancier mon controller
// il faut bien que PHP soit au courant de l'existence de la classe
require_once __DIR__."/../app/controllers/MainController.php";
require_once __DIR__."/../app/controllers/CatalogController.php";

// j'instancie mon routeur
$router = new AltoRouter();

// j'éduque mon routeur
// url de la requête = base path + route
// ex : http://localhost/oclock/titan/s05/oshop/public/ma-page = http://localhost/oclock/titan/s05/oshop/public + /ma-page
$router->setBasePath('/oclock/titan/s05/oshop/public');

// les routes des pages statiques
$router->map('GET', '/', 'MainController::home');
$router->map('GET', '/mentions-legales', 'MainController::legalMentions');

// les routes des pages catalogue
// ex de route dynamique : '/catalogue/categorie/[i:id]'
// si le visiteur accède à /catalogue/categorie/3, ça marche !
// si le visiteur accède à /catalogue/categorie/11288623, ça marche aussi !
// s'il accède à /catalogue/categorie/test, ça ne marche pas
$router->map('GET', '/catalogue/categorie/[i:id]', 'CatalogController::category');

// les routes des pages panier


// je demande à mon routeur éduqué si l'url demandée correspond à une route qu'il connaî
$match = $router->match();

$dispatcher = new Dispatcher($match, 'MainController::error');
$dispatcher->dispatch();