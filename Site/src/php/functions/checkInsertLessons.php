<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page d'ajout d'un élève ou enseignant
 */

#Connexion à la BD
include "PDOlink.php";
$PDO = new PDOlink();

#Récupération d'informations diverses
$formOK = true;
$format1 = ".jpg";
$format2 = ".jpeg";
$fileFormat = strrchr($_FILES['photo']['name'], '.');

#INFOS FORMULAIRE
$title = $_POST['title'];
$type = $_POST['type'];
$minStudent = $_POST['min'];
$maxStudent = $_POST['max'];
$namePhoto = $title . ".jpg";

#Enlève les accents et les majuscules
$search  = array(' ');
$replace = array('');
$namePhoto = strtolower(str_replace($search, $replace, $namePhoto));
$namePhotoToBDD = "'".$namePhoto."'";

#Récupération des dossier des photos de élèves et enseignants
$path = "../../../ressources/images/cours/";

#REGEX
$regexMaxMin = '/^[\d]+$/';

#Erreur en cas de Nom ou Prénom faux
if (!(preg_match($regexMaxMin, $maxStudent)) || !(preg_match($regexMaxMin, $minStudent)))
{
    $formOK = false;
}

#Erreur en cas de date de naissance fausse
if ($minStudent > $maxStudent)
{
    $formOK = false;
}

#Erreur en cas de mauvas format (jpg ou jpeg obligatoir)
if (!($fileFormat == $format1 || $fileFormat == $format2))
{
    $formOK = false;
}

#Si tous les champs sont remplis et justes
if ($formOK == true)
{
    #Si l'ajout du membre dans la base de données et réussi
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $path . $namePhoto))
    {
        $query = "INSERT INTO `t_cours` (`idCour`, `couType`, `couTitre`, `couMinEleves`, `couMaxEleves`, `couImage`) VALUES (NULL, '$type', '$title', '$minStudent', '$maxStudent', '$namePhoto')";
        $req = $PDO->exectueQuery($query);
        echo 'Upload effectué avec succès !';
        echo "<meta http-equiv=\"refresh\" content=\"2;url=../index.php\">";
    }

    #Sinon
    else
    {
        echo "Echec de l'upload !";
        echo "<meta http-equiv=\"refresh\" content=\"3;url=addMember.php\">";
    }
}

#Si un ou plusieur champs du formulaire est/sont faux
elseif ($formOK == false)
{
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../addLessons.php?error=yes&type=".$type."\">";
}

#Fermeture de la liaison à la base de données
$PDO->destroyObject();
