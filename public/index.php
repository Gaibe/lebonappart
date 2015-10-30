<?php

require '../vendor/autoload.php';



$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig(),
    'templates.path' => '../app/templates'
));


 // $villes = Ville::with('Quartier')->get();
require '../app/routes.php';

$app->run();

?>