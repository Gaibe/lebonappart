<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

Class Annonce extends Eloquent {
	protected $table = 'annonce';
	public $timestamps = false;

	public function image() {
		return $this->belongsToMany('Image');
	}
	public function quartier() {
		return $this->hasOne('Quartier');
	}
	public function type() {
		return $this->hasOne('Type');
	}
	public function vendeur() {
		return $this->hasOne('Vendeur');
	}
}

Class Image extends Eloquent {
	protected $table = 'roles';
	public $timestamps = false;

	public function annonce() {
		return $this->hasOne('Annonce');
	}
}

Class Quartier extends Eloquent {
	protected $table = 'quartier';
	public $timestamps = false;
	public function annonce() {
		return $this->belongsToMany('Annonce');
	}
	public function annonce() {
		return $this->hasOne('Ville');
	}
}

Class Type extends Eloquent {
	protected $table = 'type';
	public $timestamps = false;
	public function annonce() {
		return $this->belongsToMany('Annonce');
	}

}

Class Vendeur extends Eloquent {
	protected $table = 'vendeur';
	public $timestamps = false;
	public function annonce() {
		return $this->belongsToMany('Annonce');//hasMany ???
	}
}

Class Ville extends Eloquent {
	protected $table = 'ville';
	public $timestamps = false;	
	public function Quartier() {
		return $this->hasMany('Quartier');
	}
}


?>
