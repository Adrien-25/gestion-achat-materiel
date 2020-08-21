<?php
session_start();
/*Connexion base de donnée*/
require_once 'db.php';
/*TWIG*/
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, array(
    'cache' => false,
    'debug' => true,
));
$twig->addExtension(new \Twig\Extension\DebugExtension());
/*Test de connexion*/
if(empty($_SESSION['identifiant'])){
    header('Location: login.php');
}

if (isset($_POST['search'])){
    $search = $_POST['search'];
    //Préparation de la requête
    $sql= 'SELECT id,adresse, url, nom, reference, categorie, date_achat, date_fin_garantie, prix, conseil_entretien, ticket_achat, manuel FROM materiel WHERE nom LIKE "%'.$search.'%"';
    $sth = $dbh->prepare($sql);
    //Exécution de la requête
    $sth->execute();
    //On recupère le résultat de la requête
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);  
    //Gestion des formats des dates en français
    $intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT,IntlDateFormatter::NONE);
}
 else 
 {
     //Préparation de la requête
     $sql= 'SELECT id,adresse, url, nom, reference, categorie, date_achat, date_fin_garantie, prix, conseil_entretien, ticket_achat, manuel FROM materiel';
     $sth = $dbh->prepare($sql);
     //Exécution de la requête
     $sth->execute();
     //On recupère le résultat de la requête
     $result = $sth->fetchAll(PDO::FETCH_ASSOC);  
     //Gestion des formats des dates en français
     $intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT,IntlDateFormatter::NONE);
    }
    $template = $twig->load('pages/index.html.twig');
    echo $template->render(['liste_produits' => $result,'avatar' => $_SESSION['identifiant'],'email' => $_SESSION['email']]);
    ?>




    


