<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


Class Ville extends Eloquent {
    protected $table = 'ville';
    protected $primaryKey ='id_ville';
    public $timestamps = false; 

    public function Quartier() {
        return $this->hasMany('quartier', 'id_ville', 'id_ville');
    }
    public function Annonce() {
        return $this->hasManyThrough('Annonce', 'Quartier', 'id_ville', 'id_quartier');
    }
}
