<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


Class Ville extends Eloquent {
    protected $table = 'ville';
    public $timestamps = false; 
    public function Quartier() {
        return $this->hasMany('quartier', 'id_quatier');
    }
}