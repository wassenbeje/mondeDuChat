<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page de visualisation des élèves
 */
include 'includes/header.php';
include "functions/PDOlink.php";
$sort = "";
if (isset($_GET['sort']))
{
    $sort = $_GET['sort'];
}

$PDO = new PDOlink();

if ($sort == "nom")
{
    $query = 'SELECT  idFormateur, forNom, forPrenom, forPhoto FROM t_formateurs ORDER BY forNom ASC';
}

elseif ($sort == "prenom")
{
    $query = 'SELECT idFormateur, forNom, forPrenom, forPhoto FROM t_formateurs ORDER BY forPrenom ASC';
}

else
{
    $query = 'SELECT idFormateur, forNom, forPrenom, forPhoto FROM t_formateurs';
}

$req = $PDO->exectueQuery($query);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Formateurs</title>

        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../ressources/css/students-teachers-lessons_display.css">
        <script src="../js/refresh.js"></script>
    </head>

    <body>

        <section>

            <div id="title">

                <h1>Formateurs</h1>

                <label class="label">

                    <span>Triés par ordre :</span>

                    <select onchange="teachersRefresh()" id="select">
                        <option selected="selected">...</option>
                        <option value="nom">nom</option>
                        <option value="prenom">prénom</option>
                    </select>
                </label>

                <label class="label">
                    <button id="addButton" onclick="addTeacher()">Ajouter un enseignant</button>
                </label>

            </div>

            <div id="container">

                <?php
                #Préparation des données
                $result = $PDO->prepareData($req);

                #Affichage des informations des élèves
                foreach($result as $display)
                {
                    ?>

                    <div id="marge">

                        <div id="cartesStudent-teacher">

                            <div>

                                <div id="photo">
                                    <a href="details.php?id=<?php echo $display['idFormateur']?>&type=teacher">
                                        <img src="../../ressources/images/formateurs/<?php echo $display['forPhoto']  ?>">
                                    </a>
                                </div>

                                <div id="infos">
                                    <a id="name" href="details.php?id=<?php echo $display['idFormateur']?>&type=teacher">
                                        <p><?php echo $display['forNom']?></p>
                                        <p><?php echo $display['forPrenom']?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
        </section>
    </body>
</html>

<?php
$PDO->closeCursor($req);
$PDO->destroyObject();
?>
