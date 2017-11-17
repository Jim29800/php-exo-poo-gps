<?php
require ("class/Autoloader.php");
Autoloader::register();

$rue_paul_lacombe = new Rue("Paul Lacombe");

$rue_paul_lacombe->ajout_troncon(200, "A", "C");
$rue_paul_lacombe->ajout_troncon(400, "C", "I");
$rue_paul_lacombe->ajout_troncon(300, "I", "M");
$rue_paul_lacombe->ajout_troncon(400, "M", "Q");
$rue_paul_lacombe->ajout_troncon(100, "Q", "R");
$rue_paul_lacombe->ajout_troncon(300, "R", "T");
$rue_paul_lacombe->ajout_troncon(300, "T", "X");

$boulevard_irene = new Rue("Boulevard Irene");

$boulevard_irene->ajout_troncon(100, "A", "B");
$boulevard_irene->ajout_troncon(1000, "B", "F");

$alexandre_guiraud = new Rue("Alexandre Guiraud");

$alexandre_guiraud->ajout_troncon(50, "F", "G");
$alexandre_guiraud->ajout_troncon(100, "G", "K");
$alexandre_guiraud->ajout_troncon(700, "K", "P");
$alexandre_guiraud->ajout_troncon(700, "P", "W");
$alexandre_guiraud->ajout_troncon(400, "W", "Y");


//chemin de A vers P : ABFGKP
echo $boulevard_irene->get_longueur_troncon("A","B");

function itineraire($quartier, $tableau_de_points)
{
    $tab_long = count($tableau_de_points);
    $long = 0;
    $affiche = $tableau_de_points[0]." ";
    for ($i=0; $i < $tab_long - 1; $i++) { 
        $p1 = $tableau_de_points[$i];
        $p2 = $tableau_de_points[($i+1)];
        $affiche .= $p2." ";
        foreach ($quartier->get_rue() as $key => $rue) {

            $long += $rue->get_longueur_troncon($p1, $p2);
            
        }


    }
    return "Longueur du trajet : ".$affiche.$long." Metres";
};

$carcassonne = new Quartier();

$carcassonne->ajout_rue($rue_paul_lacombe);
$carcassonne->ajout_rue($boulevard_irene);
$carcassonne->ajout_rue($alexandre_guiraud);



//chemin de A vers P : ABFGKP
echo "<br>";
echo itineraire($carcassonne, ["A","B","F","G","K","P"]);
var_dump($rue_paul_lacombe);
var_dump($boulevard_irene);
var_dump($alexandre_guiraud);

