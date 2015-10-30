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

$app->get('/depotAnnonce' , function () use ($app) {
	
	$nouvA = new Annonce();

	$nouvA->save();
	$app->render('depotAnnonce.twig');
})->name('depot');


$app->get('/recherche' , function () use ($app) {

	$app->render('recherche.twig');
})->name('recherche');

?>