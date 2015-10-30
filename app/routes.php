<?php

$app->get('/', function () use ($app) {

	$urlDepot = $app->urlFor('depot');
	$urlRech = $app->urlFor('recherche');

	$annonces = Annonce::with('image')->limit(3)->get(); //limit si beaucoup annonces
	$app->render('accueil.twig', array(
		'annonces'=> $annonces,
		'url' =>$urlDepot,
		'urlRech' =>$urlRech
	));
})->name('accueil');

$app->get('/deposer-votre-annonce' , function () use ($app) {
	
	$app->render('depotAnnonce.twig');
})->name('depot');


$app->get('/Rechercher-vos-annonces' , function () use ($app) {
	$villes = Ville::all();

	$urlRech = $app->urlFor('accueil');

	$app->render('recherche.twig', array(
		'villes'=> $villes,
	));

})->name('recherche');

?>