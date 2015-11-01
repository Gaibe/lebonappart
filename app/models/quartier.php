<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


Class Quartier extends Eloquent {
    protected $table = 'quartier';
    protected $primayKey ='id_quartier';
    public $timestamps = false;
    public function annonce() {
        return $this->hasMany('Annonce', 'id_quartier', 'id_quartier');
    }
    public function ville() {
        return $this->belongsTo('Ville', 'id_ville', 'id_ville');

    }
}
