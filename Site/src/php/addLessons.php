<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page d'ajout d'un cours
 */
include 'includes/header.php';

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'un cours</title>

        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../ressources/css/formLessons.css">
    </head>

    <body>

        <section>

            <div id="titleForm">
                <p>Ajout d'un cours</p>
            </div>

            <div id="container">

                <div id="formulaire">

                    <form action="functions/checkInsertForm.php" method="post">
                        <label class="label left">
                            <span class="titleInput">Titre du cours :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="label right">
                            <span class="titleInput">Type de cours</span>
                            <select class="input">
                                <option>Cours tout public</option>
                                <option>Cours professionnel</option>
                            </select>
                        </label>

                        <label class="label right">
                            <span class="titleInput">Nombre minimum d'élèves :
                            <input class="input" type="text">
                        </label>

                        <label class="label left">
                            <span class="titleInput">Nombre maximum d'élèves :
                            <input class="input" type="text">
                        </label>

                        <label class="label left" id="file">
                            <span class="titleInput">Photo :</span>
                            <input class="input" type="file">
                        </label>

                        <div id="buttons">
                            <button class="button" type="reset">Effacer</button>
                            <button class="button" type="submit">Ajouter</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </body>
</html>

