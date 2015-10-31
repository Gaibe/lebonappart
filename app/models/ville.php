<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


Class Ville extends Eloquent {
    protected $table = 'ville';
    protected $primayKey ='id_quartier';
    public $timestamps = false;
    public function Quartier() {
        return $this->belongsTo('Quartier', 'id_quartier');
    }
}
