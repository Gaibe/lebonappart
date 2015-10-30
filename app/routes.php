<?php

$app->get('/', function () use ($app) {
	$annonces = Annonce::all();
	$urlD = $app->urlFor('depot');
	$urlRech = $app->urlFor('recherche');
	$app->render('accueil.twig', array('
		annonces'=> $annonces,
		'url' =>$urlD,
		'urlRech' =>$urlRech
	));
})->name('accueil');

$app->get('/deposer-votre-annonce' , function () use ($app) {
	
	$app->render('depotAnnonce.twig');
})->name('depot');


$app->get('/Rechercher-vos-annonces' , function () use ($app) {
	$listeVille = Ville::all();
	$app->render('recherche.twig');
})->name('recherche');

?>