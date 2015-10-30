<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

Class Annonce extends Eloquent {
	protected $table = 'annonce';

	public $timestamps = false;

	public function image() {
		return $this->hasMany('Image', 'id_image');
	}
	public function quartier() {
		return $this->belongsTo('Quartier', 'id_quatier');
	}
	public function type() {
		return $this->belongsTo('Type', 'id_type');
	}
	public function vendeur() {
		return $this->belongsTo('Vendeur', 'id_vendeur');
	}
}

Class Image extends Eloquent {
	protected $table = 'image';
	public $timestamps = false;

	public function annonce() {
		return $this->belongsTo('Annonce', 'id_annonce');
	}
}

Class Quartier extends Eloquent {
	protected $table = 'quartier';
	public $timestamps = false;
	public function annonce() {
		return $this->hasMany('Annonce', 'id_annonce');
	}
	public function ville() {
		return $this->hasOne('Ville', 'id_ville');
	}
}

Class Type extends Eloquent {
	protected $table = 'type';
	public $timestamps = false;
	public function annonce() {
		return $this->hasMany('Annonce', 'id_annonce');
	}

}

Class Vendeur extends Eloquent {
	protected $table = 'vendeur';
	public $timestamps = false;
	public function annonce() {
		return $this->hasMany('Annonce', 'id_annonce');
	}
}

Class Ville extends Eloquent {
	protected $table = 'ville';
	public $timestamps = false;	
	public function Quartier() {
		return $this->hasMany('quartier', 'id_quatier');
	}
}


?>
