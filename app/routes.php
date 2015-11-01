<?php

$app->get('/', function () use ($app) {

	$urlDepot = $app->urlFor('deposer-votre-annonce');
	$urlRech = $app->urlFor('recherche');

	$annonces = Annonce::with('image', 'type', 'quartier', 'quartier.ville', 'vendeur')
				->limit(3)->orderBy('id_annonce', 'DESC')->get();
	$app->render('accueil.twig', array(
		'annonces'=> $annonces,
		'url' =>$urlDepot,
		'urlRech' =>$urlRech
	));
})->name('accueil');


$app->get('/Rechercher-vos-annonces' , function () use ($app) {
	
	$villes = Ville::all();
	$types = Type::all();
	$quartiers = Quartier::all();
	


	$villes = Ville::with('Quartier')->get();

	$urlResult = $app->urlFor('resultat');

	$app->render('recherche.twig', array(
		'villes'=> $villes,
		'types'=> $types,
		'quartiers'=> $quartiers,
		'res'	=>	$urlResult,
	));
})->name('recherche');

//Pour essayer de récuperer le contenu de Annonce::with('quartier')
$resAnnonce="";



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



$app->post('/Votre-recherche' , function () use ($app,$resAnnonce) {

	
	$r = Annonce::with('type');
	$r = $r->whereHas('type', function ($query) {
      $query->where('nom','maison');
  	});
	$r = $r->get();




	$resAnnonce = Annonce::
	where('description', 'LIKE','%'.$app->request->post('motcle').'%' );
		
		if ( $app->request->post('Type') != "----") {
			$resAnnonce = $resAnnonce->with('Type');
			$resAnnonce = $resAnnonce->whereHas('type', function ($query) {
      			$query->where('nom','maison');
  			});

		}
		
		// Location / vente
		if (!( $app->request->post('location') != NULL && $app->request->post('vente') != NULL) ) {
			//location
			if ( $app->request->post('location') == 'Location')
				$resAnnonce = $resAnnonce->where('loc_vente','=','location');
			//vente
			if ( $app->request->post('vente') == 'Vente')
				$resAnnonce = $resAnnonce->where('loc_vente','=','vente');
		}
		//Superficie
		if ( $app->request->post('superficie') > 0) {
			$resAnnonce = $resAnnonce->where('superficie','<=',$app->request->post('superficie'));
		}


		// Par types


		



		$resAnnonce = $resAnnonce->get();
	


	 
/* CODE VICTO
	$resAnnonce = Annonce::where('description', 'LIKE','%'.$app->request->post('motcle').'%')->get();

	if($app->request->post('loc_vente')[0] == "Location"){

		if(isset($app->request->post('loc_vente')[1])){
			//location et location coche
			$resAnnonce = Annonce::where('loc_vente', '=', 'location')
			              ->orWhere('loc_vente', '=', 'vente')->get();
		}else{
			//vente coche
			$resAnnonce = Annonce::where('loc_vente', '=', 'location')->get();
		}
	}else if($app->request->post('loc_vente')[0] == "Vente"){
		//location coche
		$resAnnonce = Annonce::where('loc_vente', '=', 'vente')->get();
	}

*/
	$app->render('resultat.twig', array(
		'annonces' => $resAnnonce,
	));
	
	
})->name('resultat');





$app->post('/depot', function() use ($app) {
	$annonce = new Annonce();
	$annonce->description = $app->request->post('description');
	$annonce->superficie = $app->request->post('superficie');
	$annonce->loc_vente = $app->request->post('loc_vente');
	$annonce->prix = $app->request->post('prix');
	$annonce->nb_piece = $app->request->post('nb_piece');
	$annonce->id_type = $app->request->post('type');
	$annonce->id_vendeur = 1; // ??
	$annonce->id_quartier = $app->request->post('quartier');

	$vendeur = new Vendeur();
	$vendeur = Vendeur::where('mail', '=', $app->request->post('vendeur-email'))->first();
	if ($vendeur == null)
	{
		$vendeur = new Vendeur();
		$vendeur->name = $app->request->post('vendeur');
		$vendeur->mail = $app->request->post('vendeur-email');
		$vendeur->num_tel = $app->request->post('vendeur-telephone');
		$vendeur->save();
	}
	$annonce->id_vendeur = $vendeur->id_vendeur;

	$annonce->save();

	$max_image = 3;
	for ($i = 1;  $i <= $max_image; $i++) 
	{
		if($app->request->post('img-url-'.$i) != null)
		{
			$img = new Image();
			$img->url = $app->request->post('img-url-'.$i);
			$img->id_annonce = $annonce->id_annonce;
			$img->save();
		}
	}

	$app->redirect($app->urlFor("accueil"));
})->name('depot');

$app->get('/:id', function($id) use ($app) {

	$annonce = Annonce::where("id_annonce", "=", $id)->get();
	$app->render('annonce.twig', array(
		'annonce' => $annonce));
})->name("annonce");
?>
