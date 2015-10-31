<?php

$app->get('/', function () use ($app) {

	$urlDepot = $app->urlFor('depot');
	$urlRech = $app->urlFor('recherche');

	$annonces = Annonce::with('image', 'type', 'quartier', 'quartier.ville', 'vendeur')
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

//	dont work
	$quartiers = Quartier::all();
	//var_dump($quartiers);
	// <select name="Quartier">
  // {% for quart in quartiers %}
  //   <option>{{quart.nom}}</option>
  // {% endfor %}
  // </select>
	$villes = Ville::with('Quartier')->get();

	$urlResult = $app->urlFor('resultat');

	$app->render('recherche.twig', array(
		'villes'=> $villes,
		'types'=> $types,
		//'quartiers'=> $quartiers,
		'res'	=>	$urlResult,
	));
})->name('recherche');

//Pour essayer de récuperer le contenu de Annonce::with('quartier')
$resAnnonce="";

$app->post('/Votre-recherche' , function () use ($app,$resAnnonce) {
	$app->render('resultat.twig');
	$resAnnonce = Annonce::with('quartier')

	->where('ville.nom','=',$_POST['Ville']);
	foreach($resAnnonce as $value){
		var_dump($value);
	//	GLHF

	}


//return $resAnnonce;	//y'a pas moyen de faire ressortir resAnnonce de la fonction?

})->name('resultat');
//var_dump("test ".$resAnnonce);

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
