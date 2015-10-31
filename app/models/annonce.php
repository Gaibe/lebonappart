<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

Class Annonce extends Eloquent {
    protected $primayKey ='id_annonce';
    protected $table = 'annonce';

    public $timestamps = false;

    public function image() {
        return $this->hasMany('Image', 'id_annonce', 'id_annonce');
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