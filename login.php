  
<?php
/*Connexion à la base de donnée*/
require_once('db.php');
  /*Si la session est déja lancé, l'utilisateur est connecté*/
 session_start();
 if(!empty($_SESSION['identifiant'])){
   header('Location: index.php');
 }


/* élément twig */
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

$identifiant = "";
$mot_de_passe = "";
$msg = "";
if(!isset($_SESSION['identifiant'])){   
  //Préparation de la requête
  $sql= 'SELECT id, identifiant, mot_de_passe FROM utilisateur';
  $sth = $dbh->prepare($sql);
  //Exécution de la requête
  $sth->execute();
  //On recupère le résultat de la requête
  $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
  
  foreach($result as $row){
    $identifiant = $row['identifiant'];
    $mot_de_passe = $row['mot_de_passe'];
    if (isset($_POST['envoyer'])){
      if ($_POST['identifiant']==$identifiant && $_POST['mot_de_passe']==$mot_de_passe) {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['identifiant'] = $identifiant; 
        header('Location: index.php');
      }else {
          $msg = 'Mauvais indentifiant ou mot de passe';
      }
    }
  }
}
echo $msg;
$template = $twig->load('pages/login.html.twig');
echo $template->render();
?>


