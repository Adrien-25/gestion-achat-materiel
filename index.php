<?php
require_once 'vendor/autoload.php';


$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

session_start();
/*Connexion base de donnée*/
require_once 'db.php';
/*Test de connexion*/
 if(empty($_SESSION['identifiant'])){
    header('Location: login.php');
} 


//Préparation de la requête
$sql= 'SELECT id,adresse, url, nom, reference, categorie, date_achat, date_fin_garantie, prix, conseil_entretien, ticket_achat, manuel FROM materiel';
$sth = $dbh->prepare($sql);
var_dump($sql);
//Exécution de la requête
$sth->execute();

//On recupère le résultat de la requête
$result = $sth->fetchAll(PDO::FETCH_ASSOC);  
var_dump($result);
//Gestion des formats des dates en français
$intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT,IntlDateFormatter::NONE);
echo '<a href="ajouter.php">Ajouter</a><br>';
foreach($result as $row){
    echo '<tr>';
    echo '<td>'.$row['id'].'<br></td>';
    echo '<td>'.$row['adresse'].'<br></td>';
    echo '<td>'.$row['url'].'<br></td>';
    echo '<td>'.$row['nom'].'<br></td>';
    echo '<td>'.$row['reference'].'<br></td>';
    echo '<td>'.$row['categorie'].'<br></td>';
    echo '<td>'.$intlDateFormater->format(strtotime($row['date_achat'])).'<br></td>';
    echo '<td>'.$intlDateFormater->format(strtotime($row['date_fin_garantie'])).'<br></td>';
    echo '<td>'.$row['prix'].' €<br></td>';
    echo '<td>'.$row['conseil_entretien'].'<br></td>';
    echo '<td>'.$row['ticket_achat'].'<br></td>';
    echo '<td>'.$row['manuel'].'<br></td>';
    echo '<td><a href="modifier.php?modifier=1&id='.$row['id'].'"><i class="material-icons icon">edit</i></a><br></td>';
    echo '<td><button name="delete.php?id='.$row['id'].'" id="myBtn" class="btnDelete" onclick="confirmation('.$row['id'].')"><i class="material-icons icon">delete_outline</i></button><br></td>';
    echo '</tr>';
    $test = 0;  
    
}


$template = $twig->load('pages/index.html.twig');
echo $template->render();
?>