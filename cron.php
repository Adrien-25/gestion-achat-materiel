<?php
require_once 'db.php';
//Préparation de la requête
$sql= 'SELECT id,date_fin_garantie FROM materiel';
$sth = $dbh->prepare($sql);
//Exécution de la requête
$sth->execute();
//On recupère le résultat de la requête
$result = $sth->fetchAll(PDO::FETCH_ASSOC);  
//Gestion des formats des dates en français
$intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT,IntlDateFormatter::NONE);

$date_today = date('Y-m-d');

foreach ($result as $value){
    $id = $value['id'];
    $date_garantie = $value['date_fin_garantie'];
    
    /*Tache cron envoi d'email*/
    if ($date_today == $date_garantie){
        $mon_email = "adrien.schmidt7@gmail.com";
        // Headers
        $headers  = 'LamaShop' . "\r\n";
        $headers .= "From : <".$mon_email.">" ;
        // Sujet
        $subject = "ALERTE AUTOMATIQUE DE GARANTIE";
        // Message
        $message = "La garantie de votre produit est arrivé à échéance";
        //Destinataire
        $to = $mon_email;
        // Envoie de l'email
        mail($to,$subject,$message,$headers) ; 
    }
}
/* 0 8 * * * cron.php */
?>