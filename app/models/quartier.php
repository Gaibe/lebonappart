<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


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