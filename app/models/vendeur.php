<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

Class Vendeur extends Eloquent {
    protected $table = 'vendeur';
    public $timestamps = false;
    public function annonce() {
        return $this->hasMany('Annonce', 'id_annonce');
    }
}