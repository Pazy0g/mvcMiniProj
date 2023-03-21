<?php

	/**
	*  Controlleur READ USERS
	*/

	//ajoute les requettes sp�cifiques sur la base de donn�es :
	require( 'modele/user/db_param.php' ); //nom de la table � selectionner
	require( 'modele/user/db_user.php' );
	
	$user = User::readUsers(DB_USER_TABLE, 0, 3);

	//lance le trigger sur la base de donn�es :
	//$user = read_users(DB_USER_TABLE, 0, 3); //lecture des 3 premieres lignes UNIQUEMENT

	if (count($user) === 0) die("La table est vide"); 
	
	/**
	*  on traite les donn�es de $user sur la vue
	*  ==> pr�cisement dans le fichier : /vue/user/usr_data.html
	*  qui est inclus dans : vue/user/users.html
	*/
	
	include('vue/user/users.html');

