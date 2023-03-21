<?php

	/**
	*  Controlleur UPDATE USERS
	*/

	//ajoute les requettes sp�cifiques sur la base de donn�es :
	require( 'modele/user/db_param.php' ); //nom de la table � selectionner
	require( 'modele/user/db_user.php' );

	//Boolean pour Ajax :
	$valide = false;

	// Traitement des POST re�us depuis le trigger UPDATE (le bouton HTML) : 
	foreach ($_POST as $param_name => $param_val) {
		
		/**
		*  D�coupage du nom re�u $param_name avec l'underscore, ex: 1_u_nom
		*  $id �tant l'id de la ligne (tuple), ex : 1
		*  $type �tant ici la lettre : u (u pour user)
		*  $name �tant le nom du param�tre, ex : nom
		*/
		
		list($id, $type, $name) = explode('_', $param_name);
		
		//formatage correct pour la string "born", sinon elle ne sera pas trouv�e sur la base :
		if($name === "born") $name = "ne_le";
		
		//Retour pour le debug :
		//$dbug .= $id . " => " . $name . " => " . $param_val . "\n";
		
		//Action (instance statique) sur la base de donn�es :
		if ( User::updateUsers(DB_USER_TABLE, $name, $param_val, $id) ) $valide = true;

	}

	//Dbug :
	//die($dbug);

	//Retours pour AJAX :

	if (!$valide) echo "err"; //renvoi l'erreur si le traitement sur la base a echou�

	if ($valide) {

		/**
		*  On relance le trigger : lecture des utilisateurs
		*/

		$user = User::readUsers(DB_USER_TABLE); //lecture de TOUTES les lignes (fetchAll)

		if (count($user) === 0) die("La table est vide"); 
		
		//On inclus seulement la liste des utilisateurs afin qu'elle soit mise � jour sur la div id="content"
		include( 'vue/user/usr_data.php');
		
		$JS_data = null; //on vide la variable du POST pour JQuery
		
	}
