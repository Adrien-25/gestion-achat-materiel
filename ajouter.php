<?php
/*Connexion base de donnée*/
require_once 'db.php';


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
    if(strlen(trim($_POST['ticket_achat'])) !==0 ){
        $ticket_achat = trim($_POST['ticket_achat']);
    }
    if(strlen(trim($_POST['manuel'])) !==0 ){
        $manuel = trim($_POST['manuel']);
    }
    var_dump($date_achat);
    //Ajout du contenu du formulaire dans la table materiel 
    $sql = "insert into materiel(adresse, url, nom, reference, categorie, date_achat, date_fin_garantie, prix, conseil_entretien, ticket_achat, manuel) VALUES(:adresse,:url,:nom,:reference,:categorie,:date_achat,:date_fin_garantie,:prix,:conseil_entretien,:ticket_achat,:manuel)";
    
    $sth = $dbh->prepare($sql);
    //bindParam important pour se protéger contre l'injection sql et HTML
    
    $sth->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $sth->bindParam(':url', $url, PDO::PARAM_STR);
    $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':reference', $reference, PDO::PARAM_STR);
    $sth->bindParam(':categorie', $categorie, PDO::PARAM_STR);
    $sth->bindValue(':date_achat', strftime("%Y-%m-%d",strtotime($date_achat)), PDO::PARAM_STR);
    $sth->bindValue(':date_fin_garantie', strftime("%Y-%m-%d",strtotime($date_fin_garantie)), PDO::PARAM_STR);
    $sth->bindParam(':prix', $prix, PDO::PARAM_STR);
    $sth->bindParam(':conseil_entretien', $conseil_entretien, PDO::PARAM_STR);
    $sth->bindParam(':ticket_achat', $ticket_achat, PDO::PARAM_STR);
    $sth->bindParam(':manuel', $manuel, PDO::PARAM_STR);

    $sth->execute();
    //Redirection après insertion
    //header('Location: index.php');  
}
/*
Nom des input/select
id, adresse, url, nom, reference, categorie, date_achat, date_fin_garantie, prix, conseil_entretien, ticket_achat, manuel
*/
?>

<form action="" method="post">
    <!--Adresse-->
    <div>
        <label>Adresse</label>
    </div>
    <div>
        <input type="text" name="adresse" id="adresse" placeholder="Adresse">
        <small>* obligatoire</small>
    </div>
    <!--Url-->
    <div>
        <label>Url</label>
    </div>
    <div>
        <input type="text" name="url" id="url" placeholder="Url">
        <small>* obligatoire</small>
    </div>
    <!--Nom-->
    <div>
        <label>Nom</label>
    </div>
    <div>
        <input type="text" name="nom" id="nom" placeholder="Nom">
        <small>* obligatoire</small>
    </div>
    <!--Référence-->
    <div>
        <label>Référence</label>
    </div>
    <div>
        <input type="text" name="categorie" id="categorie" placeholder="Référence">
        <small>* obligatoire</small>
    </div>
    <!--Catégorie-->
    <div>
        <label>Catégorie</label>
    </div>
    <div>
        <input type="text" name="reference" id="reference" placeholder="Catégorie">
        <small>* obligatoire</small>
    </div>
    <!--Date d'achat-->
    <div>
        <label>Date d'achat</label>
    </div>
    <div>
        <input type="date" name="date_achat" id="date_achat" placeholder="Date d'achat">
        <small>* obligatoire</small>
    </div>
    <!--Date de fin de garantie-->
    <div>
        <label>Date de fin de garantie</label>
    </div>
    <div>
        <input type="date" name="date_fin_garantie" id="date_fin_garantie" placeholder="Date de fin de garantie">
        <small>* obligatoire</small>
    </div>
    <!--Prix-->
    <div>
        <label>Prix</label>
    </div>
    <div>
        <input type="text" name="prix" id="prix" placeholder="Prix">
        <small>* obligatoire</small>
    </div>
    <!--Conseil entretien-->
    <div>
        <label>Conseil entretien</label>
    </div>
    <div>
        <input type="textarea" name="conseil_entretien" id="conseil_entretien" placeholder="Conseil entretien" rows="3">
        <small>* obligatoire</small>
    </div>
    <!--Ticket achat-->
    <div>
        <label>Ticket achat</label>
    </div>
    <div>
        <input type="file" name="ticket_achat" id="ticket_achat" placeholder="Ticket achat">
        <small>* obligatoire</small>
    </div>
    <!--Manuel-->
    <div>
        <label>Manuel</label>
    </div>
    <div>
        <input type="file" name="manuel" id="manuel" placeholder="Manuel">
        <small>* obligatoire</small>
    </div>
    <!--Bouton submit-->
    <input type="submit" value="Ajouter">

</form>
