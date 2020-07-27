<?php
/*Nom de la base de donnée*/
define('DATABASE', 'materiel');
/*Identifiant de la base de donnée*/ 
define('USER', 'root');
/*Mot de passe de la base de donnée*/ 
define('PWD', '');
/*Hôte de la base de donnée */
define('HOST','localhost');


/*define('DATABASE', 'adriens_materiel');
define('USER', 'adriens');
define('PWD', 'sHXd4ZJ2qCL8rA==');
*/


/*Connexion à la base de donnée*/
try {
    $dbh = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>