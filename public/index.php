<?php

require '../vendor/autoload.php';

$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig(),
    'templates.path' => '../app/templates'
));

require '../app/routes.php';

$app->run();

?>