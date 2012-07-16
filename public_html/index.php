<?php

/*
 * Application and layout framework includes...
 */
require '../Slim/Slim.php';
require '../Views/TwigView.php';

/*
 * Initialize Slim to use the TwigView handler
 */
$settings = array(
    'view' => 'TwigView', 
    'templates.path' => '../templates',
);
$app = new Slim($settings);

/**
 * Get Common Data Set
 */
function getCommonDataSet() {
    // Get the primary links
    $primary_links = menuGetPrimaryItems();

    // Get the global site informations
    $global = getGlobalInfos();

    // Get the main javascripts
    $scripts = getMainScripts();

    return array(
        'primary_links' => $primary_links, 
        'global' => $global, 
        'assets' => array(
            'scripts' => $scripts,
        ),
    );
}

/**
 * Establish a DBConnexion with PDO
 */
function getDbConnection() {
    $params = parse_ini_file('../app/config.ini', true);

    $dbhost = $params['database']['dbhost'];
    $dbuser = $params['database']['dbuser'];
    $dbpass = $params['database']['dbpass'];
    $dbname = $params['database']['dbname'];
    $dbcharset = $params['database']['dbcharset'];

    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=$dbcharset", $dbuser, $dbpass);
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
 * Get the global site informations
 */
function getGlobalInfos() {
	return array(
		'sitename' => 'Slim Blog Demo',
	);
}

/**
 *  Include menu handler
 */
require '../app/inc/menu.php';

/**
 * Include the routes definitions
 */
require '../app/routes/main.php';
require '../app/routes/admin.php';

/*
 * Run the Application
 */
$app->run();
