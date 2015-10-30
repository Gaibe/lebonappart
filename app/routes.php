<?php

$app->get('/', function () use ($app) {
	$annonces = Annonce::all();
	$app->render('accueil.twig', array('annonces'=> $annonces));
});

?>