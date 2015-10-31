<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


Class Image extends Eloquent {
    protected $table = 'image';
    public $timestamps = false;

    public function annonce() {
        return $this->belongsTo('Annonce');
    }
}