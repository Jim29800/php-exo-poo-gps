<?php
class Rue
{
    private $nom;
    private $longueur_total = 0;    //en m
    private $liste_troncon = [];
    public function __construct($nom){
        $this->nom = $nom;
    }
    public function set_longueur_total($longueur)
    {
        $this->longueur_total += $longueur;
    }
    public function get_longueur_total()
    {
        return $this->longueur_total;
    }
    public function ajout_troncon($longueur, $point_intersection_1, $point_intersection_2) 
    {
        $troncon = new Troncon($longueur, $point_intersection_1, $point_intersection_2);
        array_push($this->liste_troncon, $troncon);
        $this->longueur_total += $troncon->get_longueur();
        return $this;
    }
    public function get_longueur_troncon($point1, $point2){
        $point1 = strtoupper($point1);
        $point2 = strtoupper($point2);         
        foreach ($this->liste_troncon as $key => $value) {
            if($value->get_point1() == $point1 && $value->get_point2() == $point2){
                return $value->get_longueur();
            }
        }
        return 0;
    }
}

class Troncon
{
    private $longueur;    //en m
    private $point_intersection_1; //sous forme de points 
    private $point_intersection_2; //sous forme de points 
    
    public function __construct($longueur, $point_intersection_1, $point_intersection_2)
    {
        $this->longueur = $longueur;
        $this->point_intersection_1 = strtoupper($point_intersection_1); 
        $this->point_intersection_2 = strtoupper($point_intersection_2);        
        

        
    }
    public function get_longueur()
    {
        return $this->longueur;
    }
    public function get_point1()
    {
        return $this->point_intersection_1;
    }
    public function get_point2()
    {
        return $this->point_intersection_2;
    }
}

class Quartier
{
    private $lieu = "Carcassonne";
    private $liste_rue = [];
    
    public function ajout_rue($rue) 
    {
        array_push($this->liste_rue, $rue);
        return $this;
    }
    public function get_rue() 
    {
        return $this->liste_rue;
    }
}



// L'objectif "GPS" du jour :
//     Créez un programme qui permette de déterminer le chemin le plus court entre deux points d'une carte routière. Pour simplifier, nous allons nous concentrer sur une zone géographique : le quartier de Carcassonne délimité par la rue Paul Lacombe, le boulevard Joliot-Curie, la rue A. Guiraud et l'avenue Leclerc 

//     Dans un premier temps, il faudra définir un modèle objet pour informatiser le maillage des rues (rues, carrefours distances, croisements, sens de circulation... à vous de voir !). L'objectif est d'afficher de manière simpliste (dans un tableau par exemple) les données des rues. Il y a mille façons de faire. Essayez d'imaginer le modèle qui vous permettra de tracer le plus simplement possible un chemin...

//     Comme ce point est particulièrement difficile, voici deux petits indices :
//     - un chemin est défini par une suite d'intersections.
//     - la longueur du chemin est composée du cumul de la longueur des tronçons qui la composent

//     Quand, c'est fait, faites appel à moi avant de démarrer l'algorithme de définition du chemin le plus court :