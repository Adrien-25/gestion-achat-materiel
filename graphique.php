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

$sql = 'SELECT categorie,date_achat,prix FROM materiel ';
$sth = $dbh->prepare( $sql );
$sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$sth->execute();
$data = $sth->fetch(PDO::FETCH_ASSOC);

var_dump($data);

$depense = array(
    "Loisirs" => "0",
    "Vêtements" => "0",
    "Multimédia" => "0",
    "jeux & jouets" => "0",
    "Vélos" => "0",
    "Téléphonie" => "0",
    "Electroménager" => "0",
    "Bricolage" => "0",
    "Maison" => "0",
    "Mode" => "0",
    "Autres" => "0",
);
if (!empty($_POST)){
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    foreach($data as $value){
        if (($value['date_achat'] > $date_debut) && ($value['date_achat'] > $date_fin)){
            if(in_array($value['categorie'] , $depense)){
                $depense[$value['categorie']] += $value['prix'];
            }
        }
    }
    asort($depense);
}

$template = $twig->load('pages/graphique.html.twig');
echo $template->render(['liste_produits' => $data,'liste_produits' => $depense,'avatar' => $_SESSION['identifiant'],'email' => $_SESSION['email']]);

?>