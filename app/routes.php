<?php

$app->get('/', function () use ($app) {
	$villes = Ville::all();
  $app->render('accueil.twig');
});

?>