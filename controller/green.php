<?php

require_once '../model/manga.php';

$green = $_POST["chiffre"];
$nom = $_POST["nom"];

Manga::saveGreen($green,$nom);