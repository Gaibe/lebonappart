<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection(
	parse_ini_file("donnes.ini")
);

$capsule->setAsGlobal();
$capsule->bootEloquent();

?>
