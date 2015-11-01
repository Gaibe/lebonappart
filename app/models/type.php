<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

Class Type extends Eloquent {
    protected $primayKey ='id_type';
    protected $table = 'type';
    public $timestamps = false;
    public function annonce() {
        return $this->belongsTo('Annonce', 'id_type', 'id_type');
    }

}