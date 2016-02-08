<?php

// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/blog.db',
//	'tablePrefix' => 'tbl_',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host=localhost;dbname=yii_blog',
	'tablePrefix' => 'tbl_',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	//'charset' => 'utf8',

);