<?php
//Afficher toutes les erreurs sauf les Notice
error_reporting(E_ALL & ~E_NOTICE);

session_start();
//chargement config
require_once('Config/config.php');

//chargement autoloader pour autochargement des classes
require_once('Config/Autoload.php');
Autoload::charger();

$cont = new FrontControleur();
