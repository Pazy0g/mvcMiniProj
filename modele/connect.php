<?php
/**
 *  Classe principale de l'objet de connexion PDO
 */

abstract class DbConnect
{

	/**
	 *   Exécute une requête SQL éventuellement paramétrée
	 */

	protected static function executerRequete($sql, $params = null)
	{
		try {
			if ($params === 'single') {
				self::connexion()->exec($sql);
			} else {
				$query = self::connexion()->prepare($sql); // requête préparée
				$query->execute($params);
				return $query;
			}
		} catch (Exception $e) {
			//Dbug
			return $e->getMessage() . "<br>Impossible de récupérer les données sur la table :" . $in_table;
		}

		$query->closeCursor();
		self::connexion()->close();
	}
	
	/**
	 *  Objet PDO Connexion 
	 *  https://www.php.net/manual/fr/pdo.construct.php
	 */

	private static function connexion()
	{
// test
		try {

			$dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT;
			if (!empty(DB_DATABASE)) $dsn .= ';dbname=' . DB_DATABASE;

			//Options PDO sur les requettes :
			$options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false
			);	//Désactiver ATTR_EMULATE_PREPARES permet d'ajouter des variables dans un tableau sur les requettes execute()

			//Constructeur PDO :			
			return new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
		} catch (Exception $e) {

			//Si la base est absente, on redirige vers la vue setup.html :
			if ($e->getCode() === 1049) {
				include('vue/setup.html');
				die;
			}

			$err = 'Erreur : ' . $e->getMessage() . '<br />';
			$err .= 'N° : ' . $e->getCode();
			die('Une erreur est survenue !<br />' . $err);
		}
	}
}
