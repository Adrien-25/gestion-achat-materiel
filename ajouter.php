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

$adresse = '';
$url = '';
$nom = '';
$reference = '';
$categorie = '';
$date_achat= '';
$date_fin_garantie= '';
$prix= '';
$conseil_entretien= '';
$ticket_achat= '';
$manuel= '';

//Si on reçoit l'id dans l'url et qu'on a soumis le formulaire
if ( count($_POST) > 0){ 
    move_uploaded_file($_FILES['ticket_achat']['name'], 'media/'.basename($_FILES['ticket_achat']['name']));
    move_uploaded_file($_FILES['manuel']['name'], 'media/'.basename($_FILES['manuel']['name']));

    if(strlen(trim($_POST['adresse'])) !== 0){
        $adresse = trim($_POST['adresse']);
    }
    if(strlen(trim($_POST['url'])) !== 0){
        $url = trim($_POST['url']);
    }
    if(strlen(trim($_POST['nom'])) !== 0){
        $nom = trim($_POST['nom']);
    }
    if(strlen(trim($_POST['reference'])) !== 0){
        $reference = trim($_POST['reference']);
    }
    if(strlen(trim($_POST['categorie'])) !== 0){
        $categorie = trim($_POST['categorie']);
    }
    if(strlen(trim($_POST['date_achat'])) !== 0){
        $date_achat = trim($_POST['date_achat']);
    }
    if(strlen(trim($_POST['date_fin_garantie'])) !== 0){
        $date_fin_garantie = trim($_POST['date_fin_garantie']);
    }
    if(strlen(trim($_POST['prix'])) !== 0){
        $prix = trim($_POST['prix']);
    }
    if(strlen(trim($_POST['conseil_entretien'])) !==0 ){
        $conseil_entretien = trim($_POST['conseil_entretien']);
    }
    if(strlen(trim($_FILES['ticket_achat']['tmp_name'])) !==0 ){
        $ticket_achat = trim($_FILES['ticket_achat']['name']);
    }
    if(strlen(trim($_FILES['manuel']['tmp_name'])) !==0 ){
        $manuel = trim($_FILES['manuel']['name']);
    }
    
    //Ajout du contenu du formulaire dans la table materiel 
    $sql = "INSERT INTO materiel(adresse, url, nom, reference, categorie, date_achat, date_fin_garantie, prix, conseil_entretien, ticket_achat, manuel) VALUES(:adresse,:url,:nom,:reference,:categorie,:date_achat,:date_fin_garantie,:prix,:conseil_entretien,:ticket_achat,:manuel)";
    
    $sth = $dbh->prepare($sql);
    //bindParam important pour se protéger contre l'injection sql et HTML

    $sth->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $sth->bindParam(':url', $url, PDO::PARAM_STR);
    $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':reference', $reference, PDO::PARAM_STR);
    $sth->bindParam(':categorie', $categorie, PDO::PARAM_STR);
    $sth->bindValue(':date_achat', strftime("%Y-%m-%d",strtotime($date_achat)), PDO::PARAM_STR);
    $sth->bindValue(':date_fin_garantie', strftime("%Y-%m-%d",strtotime($date_fin_garantie)), PDO::PARAM_STR);
    $sth->bindParam(':prix', $prix, PDO::PARAM_INT);
    $sth->bindParam(':conseil_entretien', $conseil_entretien, PDO::PARAM_STR);
    $sth->bindParam(':ticket_achat', $ticket_achat, PDO::PARAM_STR);
    $sth->bindParam(':manuel', $manuel, PDO::PARAM_STR);

    $sth->execute();
    //Redirection après insertion
    header('Location: index.php');  
}
$template = $twig->load('pages/ajouter.html.twig');
echo $template->render([
     'prix' => $prix, 'nom' =>$nom, 'adresse' => $adresse, 'url' => $url, 'reference' => $reference, 'categorie' => $categorie, 'date_achat' => $date_achat, 'date_fin_garantie' => $date_fin_garantie, 'conseil_entretien' => $conseil_entretien, 'ticket_achat' => $ticket_achat, 'manuel' => $manuel, 'avatar' => $_SESSION['identifiant'],'email' => $_SESSION['email']]);
?>

