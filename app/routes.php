<?php

$app->get('/', function () use ($app) {
	/*
	$villes=ville::all();
	foreach ($villes as $key => $ville) {
		echo ($ville->nom);
	}
	*/
	$villes = Ville::all();
  $app->render('accueil.twig');
});

?>