<?php
	
	/**
	*  Controlleur principal
	*/
	
	require('modele/connect.php' );
	
	//Parametres :
	require('modele/db_param.php');
	
	//Aiguillage selectionné par GET (principe du routage) :
	foreach ($_GET as $param_name => $param_val) {
		
		switch($param_name) {
			case "read": //http://mvc/?read
				require( 'controler/user/read.php' );
				break;
			case "update": //http://mvc/?update
				require( 'controler/user/update.php' );
				break;
			case "setup": //http://mvc/?setup
				require( 'controler/setup.php' );
				break;
			//
			// D'autres ?
			//
			default: //page 404
				include( 'vue/404.html' );
		}
		
	}
	
	// Page par defaut :
	if ( count($_GET) === 0 ) include( 'vue/intro.html' );
	
?>