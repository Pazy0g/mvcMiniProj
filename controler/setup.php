<?php

require_once('modele/db_setup.php' );
require('modele/user/db_param.php' );

Setup::createDB(DB_DATABASE);
UsrSetup::createTable(DB_USER_TABLE);
UsrSetup::insertData(1,"Léponge","Bob","robert@yogurt.fr","04/01/1999","NYC","0","0607080910");
UsrSetup::insertData(2,"Curry","Marie","marie@hmail.fr","15/12/1983","Calcutta","1","0203040506");
UsrSetup::insertData(3,"Paulo","Marco","paulo@chomail.it","15/09/1254","Venise","3","0708091011");

include('vue/weldone.html');

