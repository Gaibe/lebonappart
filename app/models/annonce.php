<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

Class Annonce extends Eloquent {
    protected $table = 'annonce';
    protected $primaryKey ='id_annonce';
    public $timestamps = false;

    public function image() {
        return $this->hasMany('Image', 'id_image');
    }
    public function quartier() {
        return $this->belongsTo('quartier', 'id_quatier');
    }
    public function type() {
        return $this->belongsTo('Type', 'id_type');
    }
    public function vendeur() {
        return $this->belongsTo('Vendeur', 'id_vendeur');
    }
}