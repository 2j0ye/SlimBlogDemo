<?php

/*
 * Application and layout framework includes...
 */
require '../Slim/Slim.php';
require '../Views/TwigView.php';

/*
 * Initialize Slim to use the TwigView handler
 */
Slim::init(array('view' => 'TwigView', 'templates_dir' => '../templates'));

/**
 * Establish a DBConnexion with PDO
 */
function getConnection() {
    $dbhost = '127.0.0.1';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'slim';
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbh;
}

/**
 * Get the main called javascripts
 */
function getMainScripts() {
	return array(
		'body' => array(
			'http://code.jquery.com/jquery-1.7.2.min.js',
			'./assets/js/main.js',
		),
	);
}

/**
 * Include the routes definitions
 */
require '../app/routes/main.php';
require '../app/routes/admin.php';

/*
 * Run the Application
 */
Slim::run();
