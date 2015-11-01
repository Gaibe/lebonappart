<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


Class Image extends Eloquent {
    protected $primayKey ='id_image';
    protected $table = 'image';
    public $timestamps = false;

    public function annonce() {
        return $this->belongsTo('Annonce');
    }
}