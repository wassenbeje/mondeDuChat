<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page de visualisation des cours
 */
include 'includes/header.php';
include "functions/PDOlink.php";
$sort = "";
if (isset($_GET['sort']))
{
    $sort = $_GET['sort'];
}

$PDO = new PDOlink();

if ($sort == "type")
{
    $query = 'SELECT idCour, couTitre, couType, couMinEleves, couMaxEleves, couImage FROM t_cours ORDER BY couType ASC';
}

elseif ($sort == "title")
{
    $query = 'SELECT idCour, couTitre, couType, couMinEleves, couMaxEleves, couImage FROM t_cours ORDER BY couTitre ASC';
}

else
{
    $query = 'SELECT idCour, couTitre, couType, couMinEleves, couMaxEleves, couImage FROM t_cours';
}

$req = $PDO->exectueQuery($query);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Cours</title>

        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../ressources/css/lessons.css">
        <script src="../js/refresh.js"></script>
    </head>

    <body>

        <section>

            <div id="en-tete-list">
                <h1>Elèves</h1>
                <label class="label">
                    <span>Triés par :</span>
                    <select onchange="lessonsRefresh()" id="select">
                        <option selected="selected">...</option>
                        <option value="title">Titre</option>
                        <option value="type">Type</option>
                    </select>
                </label>

                <label class="label">
                    <button id="addButton" onclick="addLessons()">Ajouter un cours</button>
                </label>

            </div>

            <div id="list">

                <?php
                #Préparation des données
                $result = $PDO->prepareData($req);

                #Affichage des informations des élèves
                foreach($result as $display)
                {
                    ?>

                    <div id="marge">

                        <div id="cartes">

                            <div>

                                <div id="image">
                                    <a href="details.php?id=<?php echo $display['idCour']?>&type=cours">
                                        <img src="../../ressources/images/cours/<?php echo $display['couImage']  ?>">
                                    </a>
                                </div>

                                <div id="infos">
                                    <a id="name" href="details.php?id=<?php $display['idCour']?>&type=cours">
                                        <p><?php echo $display['couTitre']?></p>
                                    </a>

                                    <div id="type">
                                        <?php
                                            if ($display['couType'] == '0')
                                            {
                                                echo '<p>Cours tout public</p>';
                                            }

                                            elseif ($display['couType'] == '1')
                                            {
                                                echo '<p>Cours professionnel</p>';
                                            }
                                        ?>
                                    </div>
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
