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
                            <span>Nom :</span>
                            <input name="lastname" class="input" type="text" placeholder="...">
                        </label>

                        <label class="label right">
                            <span>Prénom :
                            <input name="firstname" class="input" type="text" placeholder="...">
                        </label>

                        <label class="label left">
                            <span>Date de naissance :
                            <input name="birthday" class="input" type="text" maxlength="10" placeholder="xx.xx.xxxx">
                        </label>

                        <label class="label right">
                            <span>Adresse :</span>
                            <input name="address" class="input" type="text" placeholder="...">
                        </label>

                        <label class="label left">
                            <span>NPA :</span>
                            <input name="zip" class="input" type="text" placeholder="...">
                        </label>

                        <label class="label right">
                            <span>Localité :</span>
                            <input name="city" class="input" type="text" placeholder="...">
                        </label>

                        <label class="label left">
                            <span>Pays :</span>
                            <input name="country" class="input" type="text" placeholder="...">
                        </label>

                        <label class="label right">
                            <span>Téléphone :</span>
                            <input name="phone" class="input" type="text" maxlength="12" placeholder="+12345678901">
                        </label>

                        <label class="label left">
                            <span>Mail :</span>
                            <input name="mail" class="input" type="email" placeholder="...">
                        </label>

                        <label class="label right">
                            <span>Profession :</span>
                            <input name="job" class="input" type="text" placeholder="...">
                        </label>

                        <?php
                            if ($type == "teacher")
                            {
                                ?>
                                <label class="label left">
                                    <span class="titleInput">Méthode de retribution :</span>
                                    <input name="rentMethod" class="input" type="text" placeholder="...">
                                </label>

                                <label class="label right">
                                    <span class="titleInput">Montant de la retribution :</span>
                                    <input name="rentNumber" class="input" type="text" placeholder="...">
                                </label>
                                <?php
                            }
                        ?>

                        <label class="label left" id="file">
                            <span>Photo :</span>
                            <input name="photo" class="input" type="file">
                        </label>

                        <label class="label">
                            <span>Description (Max 300)</span>
                            <textarea name="description" placeholder="..." maxlength="300"></textarea>
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