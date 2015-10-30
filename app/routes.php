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


$app->get('/Rechercher-vos-annonces' , function () use ($app) {
	// marche pas $villes = Ville::with('Quartier')->get();
	$villes = Ville::all();
	$types = Type::all();
	$quartiers = quartier::all();
	$urlResult = $app->urlFor('resultat');

	$app->render('recherche.twig', array(
		'villes'=> $villes,
		'types'=> $types,
		'quartiers'=> $quartiers,
		'res'	=>	$urlResult,
	));
})->name('recherche');


$app->post('/Votre-recherche' , function () use ($app) {
	$app->render('resultat.twig');
	$resAnnonce = Annonce::with('quartier');
	
	/*foreach ($resAnnonce as $key => $value) {
		var_dump($value);
		GLHF 
		*/
	}
	
	/*
	->where('ville.nom','=',$_POST['Ville']);
	*/
	

})->name('resultat');


$app->get('/deposer-votre-annonce' , function () use ($app) {
	$app->render('depotAnnonce.twig');
})->name('depot');
?>