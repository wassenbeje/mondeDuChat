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

$req = $PDO->exectueQuery($query);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Elèves</title>

        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../ressources/css/students.css">
    </head>

    <body>

        <section>

            <div id="list">

                <?php
                #Préparation des données
                $result = $PDO->prepareData($req);

                #Affichage des informations des élèves
                foreach($result as $display)
                {
                    ?>

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
