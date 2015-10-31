<?php

$app->get('/', function () use ($app) {

	$urlDepot = $app->urlFor('depot');
	$urlRech = $app->urlFor('recherche');

	$annonces = Annonce::with('image')
				->with('type')
				->with('quartier')
				// ->with('quartier', 'ville')
				->with('vendeur')
				->limit(3)->get(); //limit si beaucoup annonces

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
	/*
	dont work
	$quartiers = Quartier::all();

	   <select name="Quartier">
  {% for quart in quartiers %}
    <option>{{quart.nom}}</option>
  {% endfor %}
  </select>

  */
	$urlResult = $app->urlFor('resultat');

	$app->render('recherche.twig', array(
		'villes'=> $villes,
		'types'=> $types,
		//'quartiers'=> $quartiers,
		'res'	=>	$urlResult,
	));
})->name('recherche');


$app->post('/Votre-recherche' , function () use ($app) {
	$app->render('resultat.twig');
	$resAnnonce = Annonce::with('quartier')

	// foreach($resAnnonce as $value){
	// 	var_dump($value);
	// //	GLHF
	//
	// }


	->where('ville.nom','=',$_POST['Ville']);



})->name('resultat');
//var_dump($app);

$app->get('/deposer-votre-annonce' , function () use ($app) {
	$villes = Ville::all();
	$types = Type::all();
	$quartiers = Quartier::all();
	$app->render('depotAnnonce.twig', array(
		'villes'=> $villes,
		'types'=> $types,
		'quartiers'=> $quartiers
		));
})->name('depot');
?>
