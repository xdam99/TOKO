<?php
require('config/blade.php');
include("config/connexion.php");
include("config/actions.php");
session_start();
$nav = 0;


// Quelle est l'action à faire ?
if (isset($_GET["action"])) {
    $action = $_GET["action"];
    
    $nav = $action;
} else {
    $action = "accueil";
}
// Est ce que cette action existe dans la liste des actions
if (array_key_exists($action, $listeDesActions) == false) {
    echo $blade->make('errors.404', ["title" => "Erreur 404"])->render();
} else {
    include($listeDesActions[$action]); // Oui, on la charge
}
ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
?>