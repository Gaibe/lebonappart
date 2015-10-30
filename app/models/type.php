<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

Class Type extends Eloquent {
    protected $table = 'type';
    public $timestamps = false;
    public function annonce() {
        return $this->hasMany('Annonce', 'id_annonce');
    }

}