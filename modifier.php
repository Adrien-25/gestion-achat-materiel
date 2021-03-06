<?php
session_start();
/*Connexion base de donnée*/
require_once 'db.php';
// TWIG
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, array(
    'cache' => false,
    'debug' => true,
));
$twig->addExtension(new \Twig\Extension\DebugExtension());

if(isset($_GET['id'])){
    $sql = 'SELECT adresse, url, nom, reference, categorie, date_achat, date_fin_garantie, prix, conseil_entretien, ticket_achat, manuel FROM materiel WHERE id=:id';

    $sth = $dbh->prepare( $sql );

    $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    $sth->execute();
    
    $data = $sth->fetch(PDO::FETCH_ASSOC);
    //Si pas de résultat de la requête data est booleen
    if(gettype($data) === "boolean"){
        //On redirige la personne sur la page index
        header('Location: index.php');

        //On arrête le script
        exit;
    }
    $categorie = $data['categorie'];
}

if (count($_POST) > 0){  
    $sql = 'UPDATE materiel SET adresse=:adresse, url= :url, nom=:nom, reference=:reference, categorie=:categorie, date_achat=:date_achat, date_fin_garantie=:date_fin_garantie, prix=:prix, conseil_entretien=:conseil_entretien, ticket_achat=:ticket_achat,manuel=:manuel WHERE id=:id';

    $sth = $dbh->prepare($sql);

    $adresse = $_POST['adresse'];
    $url = $_POST['url'];
    $nom = $_POST['nom'];
    $reference = $_POST['reference'];
    $categorieModif = $_POST['categorie'];
    $date_achat= $_POST['date_achat'];
    $date_fin_garantie= $_POST['date_fin_garantie'];
    $prix= $_POST['prix'];
    $conseil_entretien= $_POST['conseil_entretien'];
    if (($_FILES['ticket_achat']['size']) != 0){
        $ticket_achat= $_FILES['ticket_achat']['name'];
    } else {
        $ticket_achat = $data['ticket_achat'];
    }
    if (($_FILES['manuel']['size']) != 0){
        $manuel = $_FILES['manuel']['name'];
    } else {
        $manuel = $data['manuel'];
    }
    $id = htmlentities($_GET['id']);

    //bindParam important pour se protéger contre l'injection sql et HTML
    $sth->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $sth->bindParam(':url', $url, PDO::PARAM_STR);
    $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':reference', $reference, PDO::PARAM_STR);
    $sth->bindParam(':categorie', $categorieModif, PDO::PARAM_STR);
    $sth->bindValue(':date_achat', strftime("%Y-%m-%d",strtotime($date_achat)), PDO::PARAM_STR);
    $sth->bindValue(':date_fin_garantie', strftime("%Y-%m-%d",strtotime($date_fin_garantie)), PDO::PARAM_STR);
    $sth->bindParam(':prix', $prix, PDO::PARAM_STR);
    $sth->bindParam(':conseil_entretien', $conseil_entretien, PDO::PARAM_STR);
    $sth->bindParam(':ticket_achat', $ticket_achat, PDO::PARAM_STR);
    $sth->bindParam(':manuel', $manuel, PDO::PARAM_STR);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);

    $sth->execute();
    //Redirection après insertion
     header('Location: index.php');  
}


$template = $twig->load('pages/modifier.html.twig');
echo $template->render(['modify' => $data,'varcategorie' => $categorie, 'avatar' => $_SESSION['identifiant'], 'email' => $_SESSION['email']]);
?>