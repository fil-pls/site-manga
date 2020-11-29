<?php

require_once '../model/manga.php';
$resultat = Manga::getAllMangas();

?>
<!doctype html>
    <html lang="fr">
    <head>
        <title>Mangas</title>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <div id="mangas">
                <div id="header">
                    <h1>Mangas</h1>
                    <input onclick="greenReset()" value="reset" id="reset" type="button">
                </div>
                <div id="contenu">
                    <?php 
                    
                        for($i = 0;$i<count($resultat);$i++) {
                            echo "<div class='manga'>
                                <img class='manga-img' src='images/" . $resultat[$i]['nom'] . "-logo.jpg' alt=''>
                                <img class='manga-vert' id='vert".$i."' src='images/vert.png' alt=''>
                                <p>" . $resultat[$i]['libelle'] . "</p>
                                <p id='nombreChap".$i."'>" . $resultat[$i]['nombreChapitre'] . "</p>
                                <div id='idbutton'>
                                    <input class='button' onclick='green(`vert".$i."`,`" . $resultat[$i]['nom'] . "`)' type='button' value='fait'>
                                    <input class='button' onclick='ungreen(`vert".$i."`,`" . $resultat[$i]['nom'] . "`)' type='button' value='pas fait'>
                                </div>
                                <input id='edit' class='button' onclick='showForm(`editform".$i."`)' type='button' value='edit'>
                                <div id='editform".$i."'>
                                    <input id='inputEdit".$i."' value='" . $resultat[$i]['nombreChapitre'] . "' type='text'>
                                    <input id='submitEdit".$i."' type='submit' onclick='updateNombre(`" . $resultat[$i]['nom'] . "`,`inputEdit".$i."`)' value='go'>
                                    <img id='croix".$i."' onclick='hideForm(`editform".$i."`)' src='images/croix.gif' alt=''>
                                </div>
                            </div>";
                        }

                    ?>
                   <div class="manga" id="final">
                       <img onclick="showFormAdd()" src="images/plus.gif" alt="">
                   </div>
                   <div class="formAdd">
                        <img id="croixFinal" onclick="hideFormAdd()" src="images/croix.gif" alt="">
                        <div id='affichage'>
                            <label for="nom">nom</label>
                            <input id="nom" name="nom" type="text">
                            <label for="libelle">libelle</label>
                            <input id="libelle" name="libelle" type="text">
                            <label for="nombreChapitre">Nombre de chapitres</label>
                            <input id="numberChapitre" name="nombreChapitre" type="number">
                            <input id="submitAjout" onclick='submitAjout()' type="submit">
                            <span id="Message"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="script.js"></script>
</body>
</html>