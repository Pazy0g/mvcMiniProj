<?php

	/**
	*  Controlleur READ USERS
	*/

	//ajoute les requettes spécifiques sur la base de données :
	require( 'modele/user/db_param.php' ); //nom de la table à selectionner
	require( 'modele/user/db_user.php' );
	
	$user = User::readUsers(DB_USER_TABLE, 0, 3);

	//lance le trigger sur la base de données :
	//$user = read_users(DB_USER_TABLE, 0, 3); //lecture des 3 premieres lignes UNIQUEMENT

	if (count($user) === 0) die("La table est vide"); 
	
	/**
	*  on traite les données de $user sur la vue
	*  ==> précisement dans le fichier : /vue/user/usr_data.html
	*  qui est inclus dans : vue/user/users.html
	*/
	
	include('vue/user/users.html');

