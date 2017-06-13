<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page d'ajout d'un élève ou enseignant
 */

include "PDOlink.php";
$PDO = new PDOlink();

$formOK = true;

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
$namePhoto = strtolower(($firstname.$lastname . ".jpg"));
$description = $_POST['description'];

if (isset($_POST['rentMethod']) && isset($_POST['rentNumber']))
{
    $rentMethod = $_POST['rentMethod'];
    $rentNumber = $_POST['rentNumber'];
}

$pathStudent = "../../../ressources/images/eleves";
$pathTeacher = "../../../ressources/images/formateurs";

#REGEX
$regexName = '/^[a-zA-Z \é\è\ö\ô\ê]+$/';
$regexBirthdate = '/^\d{2}\.\d{2}\.\d{4}$/';
$regexAddress = '/^[a-z A-Z0-9]+$/';
$regexNPA = '/^[\d]+$/';
$regexCityCountry = '/^[a-z A-Z]+$/';
$regexPhone = '/^\+[\d]+$/';
$regexJob = '/^[a-z A-Z]+$/';

if (!(preg_match($regexName, $firstname) && preg_match($regexName, $lastname)))
{
    $formOK = false;
}

if (!preg_match($regexBirthdate, $birthday))
{
    $formOK = false;
}

if (!preg_match($regexAddress, $address))
{
    $formOK = false;
}

if (!preg_match($regexNPA, $npa))
{
    $formOK = false;
}

if (!(preg_match($regexCityCountry, $city) && preg_match($regexCityCountry, $country)))
{
    $formOK = false;
}

if (!preg_match($regexPhone, $phone))
{
    $formOK = false;
}

if (!preg_match($regexJob, $job))
{
    $formOK = false;
}

if ($formOK == true)
{
    $query = "INSERT INTO `t_eleves` (`idEleve`, `eleNom`, `elePrenom`, `eleDateNaissance`, `eleRue`, `eleNPA`, `eleLocalite`, `elePays`, `eleTelephone`, `eleMail`, `eleProfession`, `eleCommentaire`, `elePhoto`) VALUES (NULL, '$firstname', '$lastname', '$birthday', '$address', '$npa', '$city', '$country', '$phone', '$mail', '$job', '$description', $namePhoto)";
    $req = $PDO->exectueQuery($query);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $pathStudent . $namePhoto))
    {
        echo 'Upload effectué avec succès !';
    }

    else
    {
        echo "Echec de l'upload !";
    }
}

$PDO->destroyObject();
