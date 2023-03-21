<?php

	/**
	*  DAO : USER
	*  Ici seulement avec "READ" et "UPDATE"
	*  Aide sur le CRUD : 
	*  https://www.cloudways.com/blog/introduction-php-data-objects/
	*/

	class User extends DbConnect {

		/**
		*  Lecture des tuples dans une table
		*  En option on selectionne le premier tuple au choix : $from
		*  On retourne le nombre total de tuples choisi : $total
		*/
		public static function readUsers($in_table, $from=null, $total=null) {
				
			$sql = "SELECT * FROM $in_table";
			
			$arr_selector = null;
			
			if( $from>=0 and $total>=1 ) {
				$sql .= " ORDER BY id LIMIT ?, ?";
				$arr_selector = [ $from, $total ];
			}
				
			$query = self::executerRequete($sql, $arr_selector);
				
			$out = $query->fetchAll(); //lecture de tous les tuples
			
			return $out;

		}
		
		
		/**
		*  Mise à jour d'une donnée dans un tuple
		*/
		public static function updateUsers($in_table, $name, $value, $id) {
				
			try {
				
				$sql = "UPDATE ".$in_table." SET ".$name."='".$value."' WHERE id=:id";
				
				$arr_selector = [ ':id' => $id ]; //requette préparée et sécurisée
				
				$query = self::executerRequete($sql, $arr_selector);
				
				return true;
			}
				
			catch(Exception $e) {
				//Dbug
				//echo $e->getMessage();
				return false;
			}

		}

	}