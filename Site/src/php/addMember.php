<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page d'ajout d'un élève ou enseignant
 */
include 'includes/header.php';

if (isset($_GET['type']))
{
    $type = $_GET['type'];

    ?>

    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Elèves</title>

            <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
            <link rel="stylesheet" type="text/css" href="../../ressources/css/form.css">
        </head>

        <body>

        <section>
            <div id="title">
                <p>Ajout d'un élève</p>
            </div>
            <div id="container">

                <div id="formulaire">
                    <form action="functions/checkInsertForm.php" method="post">
                        <label class="left">
                            <span>Nom :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="right">
                            <span>Prénom :
                            <input class="input" type="text">
                        </label>

                        <label class="left">
                            <span>Date de naissance :
                            <input class="input" type="date">
                        </label>

                        <label class="right">
                            <span>Adresse :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="left">
                            <span>NPA :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="right">
                            <span>Localité :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="left">
                            <span>Pays :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="right">
                            <span>Téléphone :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="left">
                            <span>Mail :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="right">
                            <span>Profession :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="left" id="file">
                            <span>Photo :</span>
                            <input type="file">
                        </label>

                        <label>
                            <span>Description (Max 300)</span>
                            <textarea></textarea>
                        </label>

                        <button class="button" type="reset">Effacer</button>
                        <button class="button" type="submit">Ajouter</button>

                    </form>
                </div>
            </div>
        </section>
        </body>
    </html>
    <?php
}

else{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}