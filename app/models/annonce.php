<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

Class Annonce extends Eloquent {
    protected $primaryKey ='id_annonce';
    protected $table = 'annonce';
    public $timestamps = false;

    public function image() {
        return $this->hasMany('Image', 'id_annonce', 'id_annonce');
    }
    public function quartier() {

        return $this->belongsTo('Quartier', 'id_quartier', 'id_quartier');
    }
    public function type() {
        return $this->hasOne('Type', 'id_type', 'id_type');
    }
    public function vendeur() {
        return $this->belongsTo('Vendeur', 'id_vendeur', 'id_vendeur');
    }
}
