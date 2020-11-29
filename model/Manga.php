<?php

require_once 'connect.php';

class Manga extends Connect{

    //Attributs
    private int $id;
    private string $nom;
    private string $libelle;
    private int $nombreChapitre;
    private $green;

    //constructeur
    public function __construct(){
        $this->nom = "";
        $this->libelle = "";
        $this->nombreChapitre=0;
        $this->green = 0;
        parent::__construct();
    }

    //getters

    public function getId(){
        return $this->id;
    }

    
    public function getNom() {
        return $this->nom;
    }
    
    public function getLibelle(){
        return $this->libelle;
    }
    
    public function getNombreChapitre() {
        return $this->nombreChapitre;
    }
    
    public function getGreen(){
        return $this->green;
    }
    //setters

    private function setId($id){
        $this->id = $id;
    }

    
    public function setNom($nom){
        $this->nom = $nom;
    }
    
    public function setLibelle($libelle){
        $this->libelle = $libelle;
    }

    public function setNombreChapitre($nombreChapitre){
        $this->nombreChapitre = $nombreChapitre;
    }

    public function setGreen($green){
        $this->green = $green;
    }
    

    public static function getAllMangas(){
        $manga = new Manga();
        $sql = 'SELECT * FROM `manga` order by libelle';
        $select = $manga->prepare($sql);
        $select->execute();

        $resultat = $select->fetchAll();

        return $resultat;
    }

    public static function save($nom,$libelle,$nombreChapitre){
        $sql = 'Insert into manga (nom,libelle,nombreChapitre,green) values(:nom,:libelle,:nombreChapitre,:green)';
        $manga = new Manga();
        $insert = $manga->prepare($sql);
        $insert->execute([
            ":nom" => $nom,
            ":libelle" => $libelle,
            ":nombreChapitre" => $nombreChapitre,
            ":green" => $manga->getGreen()
        ]);
    }

    public static function saveGreen($green,$nom){
        $manga = new Manga();
        $sql='update manga set green = :green where nom = :nom';
        $save = $manga->prepare($sql);
        $save->execute([
            ":green"=> $green,
            ":nom"=> $nom]);    
    }

    public function getByName(string $name) 
    {
        $sql = "SELECT * FROM `manga` WHERE nom = :nom";
        $select = $this->prepare($sql);
        $select->execute([":nom" => $name]);

        $resultat = $select->fetch();
        if($resultat) {
            $this->setId($resultat["id"]);
            $this->setNom($resultat["nom"]);
            $this->setLibelle( $resultat["libelle"]);
            $this->setNombreChapitre($resultat["nombreChapitre"]);
        } else {
            echo "il n'y a pas de manga répondant à ce nom";
        }
    }

    public static function updateNombre($nom,$nombreChapitre){
        $manga = new Manga();
        $manga->getByName($nom);
        $id= $manga->getId();
        $sql = 'update manga set nombreChapitre = :nombreChapitre where id= :id';
        $update = $manga->prepare($sql);
        $update->execute([":nombreChapitre" => $nombreChapitre,
        ":id" => $id]);
    }

    public static function greenReset(){
        $db = new Connect();
        $sql = 'update manga set green = 0';
        $db->prepare($sql)->execute();
    }
}