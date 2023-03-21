<?php

//---------/
/* SETUP */
//-------/

//push


/**
 *  Création de la BDD.
 *  Connexion unique au SGBD afin de créer la base.
 */

class Setup
{

	public static function createDB($db)
	{

		try {
			$dbh = new PDO("mysql:host=" . DB_HOST, DB_USERNAME, DB_PASSWORD);
			$dbh->exec("CREATE DATABASE " . $db) or die(print_r($dbh->errorInfo(), true));
		} catch (PDOException $e) {
			die("DB ERROR: " . $e->getMessage());
		}
	}
}

/**
 *  Création de la table USER, et peuplement de la table.
 *  Classe héritée de DbConnect()
 */


class UsrSetup extends DbConnect
{

	const table = DB_USER_TABLE;

	/* @bollean */
	public static function createTable()
	{

		$table = self::table;

		// Création d'une table 'clients_tbl' :
		$sql = "CREATE TABLE $table(
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nom VARCHAR(30) NOT NULL,
				prenom VARCHAR(30) NOT NULL,
				email VARCHAR(70) NOT NULL UNIQUE,
				ne_le VARCHAR(30) NOT NULL,
				ville VARCHAR(30) NOT NULL,
				enfants VARCHAR(30) NOT NULL,
				tel VARCHAR(30) NOT NULL
			)";
		return self::executerRequete($sql, null);
	}

	/* @bollean */
	public static function insertData($id, $nom, $prenom, $email, $nele, $ville, $enfants, $tel)
	{

		$table = self::table;
		$sql = "INSERT INTO $table (id, nom, prenom, email, ne_le, ville, enfants, tel) VALUES ($id, '$nom', '$prenom', '$email', '$nele', '$ville', '$enfants', '$tel')";
		return self::executerRequete($sql, null);
	}
}
