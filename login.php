  
<?php
/*Connexion à la base de donnée*/
  require_once('db.php');
  /*Si la session est déja lancé, l'utilisateur est connecté*/
  session_start();
  if(!empty($_SESSION['identifiant'])){
    header('Location: index.php');
  }

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
    $result = $sth->fetch(PDO::FETCH_ASSOC); 

    $identifiant = $result['identifiant'];
    $mot_de_passe = $result['mot_de_passe'];

    if(isset($_POST['identifiant'])){
        if ($_POST['identifiant'] == $identifiant && $_POST['mot_de_passe'] == $mot_de_passe) {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['identifiant'] = $identifiant; 
        header('Location: index.php');
    }else {
        $msg = 'Mauvais indentifiant ou mot de passe';
    }
    }
}

?>
