<?php
define('DATABASE', 'materiel');
define('USER', 'root');
define('PWD', '');

/*define('DATABASE', 'adriens_materiel');
define('USER', 'adriens');
define('PWD', 'sHXd4ZJ2qCL8rA==');
*/

define('HOST','localhost');

/*Connexion à la base de donnée*/
try {
    $dbh = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>