<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


Class quartier extends Eloquent {
    protected $table = 'quartier';
    protected $primayKey ='id_quartier';
    public $timestamps = false;
    public function annonce() {
        return $this->hasMany('annonce', 'id_annonce');
    }
    public function ville() {
        return $this->hasOne('ville', 'id_ville');
    }
}