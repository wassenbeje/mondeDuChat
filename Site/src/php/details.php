<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page de visualisation des élèves
 */
include 'includes/header.php';
include "functions/PDOlink.php";
$id = $_GET['id'];
$type = $_GET['type'];

$PDO = new PDOlink();

if ($type == 'student')
{
    $query = 'SELECT eleNom, elePrenom, eleDateNaissance, eleRue, eleNPA, eleLocalite, elePays, eleTelephone, eleMail, eleProfession, eleCommentaire, elePhoto FROM t_eleves WHERE idEleve=' . $id;
}

elseif ($type == 'teacher')
{
    $query = 'SELECT forNom, forPrenom, forDateNaissance, forRue, forNPA, forLocalite, forPays, forTelephone, forMail, forProfession, forCommentaire, forPhoto FROM t_formateurs WHERE idFormateur=' . $id;
}

elseif ($type == 'cours')
{
    $query = 'SELECT couType, couTitre, couMinEleves, couMaxEleves, couImage FROM t_cours WHERE idcour=' . $id;
}

$req = $PDO->exectueQuery($query);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails</title>

        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../ressources/css/details.css">
    </head>

    <body>

        <section>

            <div id="list">

                <div id="case">

                    <?php
                    #Préparation des données
                    $result = $PDO->prepareData($req);
                    if ($type == 'student')
                    {
                        #Affichage des informations des élèves
                        foreach($result as $display)
                        {
                            echo '<img id="photo" src="../../ressources/images/eleves/'.$display['elePhoto'].'">';

                            echo '<div id="infosP1">';
                                echo '<ul>';
                                    echo '<li class="infos">Nom : '. $display['eleNom'].'</li>';
                                    echo '<li class="infos">Prénom : '. $display['elePrenom'].'</li>';
                                    echo '<li class="infos">Date de naissance : '. $display['eleDateNaissance'].'</li>';
                                    echo '<li class="infos">Adresse : '. $display['eleRue'].'</li>';
                                    echo '<li class="infos">Numéro postal : '. $display['eleNPA'].'</li>';
                                    echo '<li class="infos">Localité : '. $display['eleLocalite'].'</li>';
                                    echo '<li class="infos">Pays : '. $display['elePays'].'</li>';
                                    echo '<li class="infos">Téléphone : '. $display['eleTelephone'].'</li>';
                                    echo '<li class="infos">Mail : '. $display['eleMail'].'</li>';
                                    echo '<li class="infos">Profession : '. $display['eleProfession'].'</li>';
                                echo '</ul>';
                            echo '</div>';

                            echo '<div id="titleInfosP2">';
                            echo '<p id="titleComment">Commentaire</p>';
                            echo '</div>';

                            echo '<div id="infosP2">';
                                echo '<p class="infos">'.$display['eleCommentaire'].'</p>';
                            echo '</div>';
                        }
                    }

                    elseif ($type == 'teacher')
                    {
                        #Affichage des informations des formateurs
                        foreach($result as $display)
                        {
                            echo '<img id="photo" src="../../ressources/images/eleves/'.$display['forPhoto'].'">';

                            echo '<div id="infosP1">';
                            echo '<ul>';
                            echo '<li class="infos">Nom : '. $display['forNom'].'</li>';
                            echo '<li class="infos">Prénom : '. $display['forPrenom'].'</li>';
                            echo '<li class="infos">Date de naissance : '. $display['forDateNaissance'].'</li>';
                            echo '<li class="infos">Adresse : '. $display['forRue'].'</li>';
                            echo '<li class="infos">Numéro postal : '. $display['forNPA'].'</li>';
                            echo '<li class="infos">Localité : '. $display['forLocalite'].'</li>';
                            echo '<li class="infos">Pays : '. $display['forPays'].'</li>';
                            echo '<li class="infos">Téléphone : '. $display['forTelephone'].'</li>';
                            echo '<li class="infos">Mail : '. $display['forMail'].'</li>';
                            echo '<li class="infos">Profession : '. $display['forProfession'].'</li>';
                            echo '</ul>';
                            echo '</div>';

                            echo '<div id="titleInfosP2">';
                            echo '<p id="titleComment">Commentaire</p>';
                            echo '</div>';

                            echo '<div id="infosP2">';
                            echo '<p class="infos">'.$display['forCommentaire'].'</p>';
                            echo '</div>';
                        }
                    }

                    elseif ($type == 'cours')
                    {
                        ?>
                        <head>
                            <link rel="stylesheet" type="text/css" href="../../ressources/css/detailsLessons.css">
                        </head>
                        <?php
                        #Affichage des informations des formateurs
                        foreach($result as $display)
                        {
                            echo '<img id="photo" src="../../ressources/images/cours/'.$display['couImage'].'">';

                            echo '<div id="infosP1">';
                                echo '<ul>';

                                    if ($display['couType'] == 0)
                                    {
                                        echo '<li class="infos">Type de cours : tout public</li>';
                                    }

                                    elseif ($display['couType'] == 1)
                                    {
                                        echo '<li class="infos">Type de cours : professionnel</li>';
                                    }
                                    echo '<li class="infos">Titre du cours : '. $display['couTitre'].'</li>';
                                    echo "<li class='infos'>Nombre minimum d'élèves : ". $display['couMinEleves']."</li>";
                                    echo "<li class='infos'>Nombre maximum d'élèves : ". $display['couMaxEleves']."</li>";

                                echo '</ul>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </body>
</html>

<?php
$PDO->closeCursor($req);
$PDO->destroyObject();
?>
