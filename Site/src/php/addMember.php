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

            <div id="titleForm">
                <?php
                    if ($type == "student")
                    {
                       echo "<p>Ajout d'un élève</p>";
                    }
                    elseif ($type == "teacher")
                    {
                        echo "<p>Ajout d'un enseignant</p>";
                    }
                ?>

            </div>
            <div id="container">

                <div id="formulaire">
                    <form action="functions/checkInsertForm.php" method="post">
                        <label class="label left">
                            <span class="titleInput">Nom :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="label right">
                            <span class="titleInput">Prénom :
                            <input class="input" type="text">
                        </label>

                        <label class="label left">
                            <span class="titleInput">Date de naissance :
                            <input class="input" type="date">
                        </label>

                        <label class="label right">
                            <span class="titleInput">Adresse :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="label left">
                            <span class="titleInput">NPA :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="label right">
                            <span class="titleInput">Localité :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="label left">
                            <span class="titleInput">Pays :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="label right">
                            <span class="titleInput">Téléphone :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="label left">
                            <span class="titleInput">Mail :</span>
                            <input class="input" type="text">
                        </label>

                        <label class="label right">
                            <span class="titleInput">Profession :</span>
                            <input class="input" type="text">
                        </label>

                        <?php
                            if ($type == "teacher")
                            {
                                ?>
                                <label class="label left">
                                    <span class="titleInput">Méthode de retribution :</span>
                                    <input class="input" type="text">
                                </label>

                                <label class="label right">
                                    <span class="titleInput">Montant de la retribution :</span>
                                    <input class="input" type="text">
                                </label>
                                <?php
                            }
                        ?>

                        <label class="label left" id="file">
                            <span class="titleInput">Photo :</span>
                            <input class="input" type="file">
                        </label>

                        <label>
                            <span class="titleInput">Description (Max 300)</span>
                            <textarea></textarea>
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
    <?php
}

else{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}