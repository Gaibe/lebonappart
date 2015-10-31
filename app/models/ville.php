<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


Class Ville extends Eloquent {
    protected $table = 'ville';
    protected $primayKey ='id_ville';
    public $timestamps = false;
    public function Quartier() {
        return $this->belongsTo('quartier', 'id_quartier');

    }
}
