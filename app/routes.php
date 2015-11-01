<?php

$app->get('/', function () use ($app) {

	$urlDepot = $app->urlFor('deposer-votre-annonce');
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
	$resAnnonce = Annonce::with('quartier')->get();


	->where('ville.nom','=',$_POST['Ville']);
	foreach($resAnnonce as $value){
		var_dump($value);
	//	GLHF

	}
})->name('resultat');
//var_dump("test ".$resAnnonce);

$app->get('/deposer-votre-annonce' , function () use ($app) {
	$villes = Ville::all();
	$types = Type::all();
	$quartiers = Quartier::all();
	$action = $app->urlFor("depot");
	$app->render('depotAnnonce.twig', array(
		'villes'=> $villes,
		'types'=> $types,
		'quartiers'=> $quartiers,
		'action' => $action
		));
})->name('deposer-votre-annonce');

$app->post('/depot', function() use ($app) {
	$annonce = new Annonce();
	$annonce->description = $app->request->post('description');
	$annonce->superficie = $app->request->post('superficie');
	$annonce->loc_vente = $app->request->post('loc_vente');
	$annonce->prix = $app->request->post('prix');
	$annonce->nb_piece = $app->request->post('nb_piece');
	$annonce->id_type = $app->request->post('type');
	$annonce->id_vendeur = 1;
	$annonce->id_quartier = $app->request->post('quartier');

	// $vendeur = new Vendeur();
	// $vendeur = Vendeur::where('email', '=', $app->request->post('vendeur-email'));


	$annonce->save();
	$app->redirect($app->urlFor("accueil"));
})->name('depot');
?>
