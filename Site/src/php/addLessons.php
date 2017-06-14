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
        <link rel="stylesheet" type="text/css" href="../../ressources/css/form.css">
    </head>

    <body>

        <section>

            <div id="titleForm">
                <p>Ajout d'un cours</p>
            </div>

            <div id="container">

                <div id="formulaire">

                    <form action="functions/checkInsertLessons.php" method="post" enctype="multipart/form-data">
                        <label class="label left">
                            <span class="titleInput">Titre du cours :</span>
                            <input name="title" class="input" type="text">
                        </label>

                        <label class="label right">
                            <span class="titleInput">Type de cours</span>
                            <select name="type" class="input">
                                <option value="0">Cours tout public</option>
                                <option value="1">Cours professionnel</option>
                            </select>
                        </label>

                        <label class="label left">
                            <span class="titleInput">Nombre minimum d'élèves :
                            <input name="min" class="input" type="text">
                        </label>

                        <label class="label right">
                            <span class="titleInput">Nombre maximum d'élèves :
                            <input name="max" class="input" type="text">
                        </label>

                        <label class="label left" id="file">
                            <span class="titleInput">Photo :</span>
                            <input name="photo" class="input" type="file">
                        </label>

                        <div id="buttons">
                            <button class="button" type="reset">Effacer</button>
                            <button class="button" type="submit">Ajouter</button>
                        </div>

                        <?php
                        if (isset($_GET['error']))
                        {
                            $error = $_GET['error'];
                            if ($error == "yes")
                            {
                                echo '<p id="error">Un ou plusieurs champs sont incorrects</p>';
                            }
                        }
                        ?>

                    </form>
                </div>
            </div>
        </section>
    </body>
</html>

