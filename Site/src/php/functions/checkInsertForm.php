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
$type = $_GET['type'];

#INFOS FORMULAIRE
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$npa = $_POST['zip'];
$city = $_POST['city'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$job = $_POST['job'];
$namePhoto = $firstname.$lastname . ".jpg";
$description = $_POST['description'];



#Si le formulaire est de type Teacher
if (isset($_POST['rentMethod']) && isset($_POST['rentNumber']))
{
    $rentMethod = $_POST['rentMethod'];
    $rentNumber = $_POST['rentNumber'];
}

#Enlève les accents et les majuscules
$search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
$replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
$namePhoto = strtolower(str_replace($search, $replace, $namePhoto));
$namePhotoToBDD = "'".$namePhoto."'";

#Récupération des dossier des photos de élèves et enseignants
$pathStudent = "../../../ressources/images/eleves/";
$pathTeacher = "../../../ressources/images/formateurs/";

#REGEX
$regexName = '/^[a-zA-Z \é\è\ö\ô\ê]+$/';
$regexBirthdate = '/^\d{2}\.\d{2}\.\d{4}$/';
$regexAddress = '/^[a-z A-Z0-9]+$/';
$regexNPA = '/^[\d]+$/';
$regexCityCountry = '/^[a-z A-Z]+$/';
$regexPhone = '/^\+[\d]+$/';
$regexJob = '/^[a-z A-Z]+$/';

#Erreur en cas de Nom ou Prénom faux
if (!(preg_match($regexName, $firstname) && preg_match($regexName, $lastname)) || $firstname == '' || $lastname == '')
{
    $formOK = false;
}

#Erreur en cas de date de naissance fausse
if (!preg_match($regexBirthdate, $birthday))
{
    $formOK = false;
}

#Erreur en cas d'adresse fausse
if (!preg_match($regexAddress, $address))
{
    $formOK = false;
}

#Erreur en cas de code postal faux
if (!preg_match($regexNPA, $npa))
{
    $formOK = false;
}

#Erreur en cas de pays ou ville incorrecte
if (!(preg_match($regexCityCountry, $city) && preg_match($regexCityCountry, $country)))
{
    $formOK = false;
}

#Erreur en cas de numéro de téléphone faux
if (!preg_match($regexPhone, $phone))
{
    $formOK = false;
}

#Erreur en cas de Métrier incorrect
if (!preg_match($regexJob, $job))
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
    if ($type == "student")
    {
        #Si l'ajout du membre dans la base de données et réussi
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $pathStudent . $namePhoto))
        {
            $query = "INSERT INTO `t_eleves` (`idEleve`, `eleNom`, `elePrenom`, `eleDateNaissance`, `eleRue`, `eleNPA`, `eleLocalite`, `elePays`, `eleTelephone`, `eleMail`, `eleProfession`, `eleCommentaire`, `elePhoto`) VALUES (NULL, '$firstname', '$lastname', '$birthday', '$address', '$npa', '$city', '$country', '$phone', '$mail', '$job', '$description', $namePhotoToBDD)";
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

    elseif ($type == "teacher")
    {

        #Si l'ajout du membre dans la base de données et réussi
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $pathTeacher . $namePhoto))
        {
            $query = "INSERT INTO `t_formateurs` (`idFormateur`, `forNom`, `forPrenom`, `forDateNaissance`, `forRue`, `forNPA`, `forLocalite`, `forPays`, `forTelephone`, `forMail`, `forProfession`, `forRetributionMontant`, `forRetributionMethode`, `forCommentaire`, `forPhoto`) VALUES (NULL, '$firstname', '$lastname', '$birthday', '$address', '$npa', '$city', '$country', '$phone', '$mail', '$job', '$rentNumber', '$rentMethod', '$description', $namePhotoToBDD)";
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
}

#Si un ou plusieur champs du formulaire est/sont faux
elseif ($formOK == false)
{
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../addMember.php?error=yes&type=".$type."\">";
}

#Fermeture de la liaison à la base de données
$PDO->destroyObject();
