<?php
function connexionPDO() {
    $login = 'root';
    $db_Name = 'mini_projet';
    $mdp = '';
    $serveur = 'localhost';

    try{
        $conn = new PDO("mysql:host=$serveur;dbname=$db_Name", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;


    }
    catch (pdoexception $e)
    die('Echec de la connexion');


    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // prog de test
        header('Content-Type:text/plain');
    
        echo "connexionPDO() : \n";
        print_r(connexionPDO());
    }


}