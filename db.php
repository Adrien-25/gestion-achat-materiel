<?php

/***En local */
/*Nom de la base de donnée*/
define('DATABASE', 'gestion_achat');
/*Identifiant de la base de donnée*/ 
define('USER', 'root');
/*Mot de passe de la base de donnée*/ 
define('PWD', '');
/*Hôte de la base de donnée */
define('HOST','localhost');

/***prod Fouad */
// define('DATABASE', 'fouadl_gestionproduits');
// /*Identifiant de la base de donnée*/ 
// define('USER', 'fouadl');
// /*Mot de passe de la base de donnée*/ 
// define('PWD', '51n68L9j13Hplw==');
// /*Hôte de la base de donnée */
// define('HOST','localhost');

/**prod adrien */
// /*Nom de la base de donnée*/
// define('DATABASE', 'adriens_gestion');
// /*Identifiant de la base de donnée*/ 
// define('USER', 'adriens');
// /*Mot de passe de la base de donnée*/ 
// define('PWD', 'sHXd4ZJ2qCL8rA==');
// /*Hôte de la base de donnée */
// define('HOST','localhost');

/*Connexion à la base de donnée*/
try {
    // En local
    $dbh = new PDO('mysql:host='.HOST.';port=3308;dbname='.DATABASE, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    // En prod
    // $dbh = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>








    


