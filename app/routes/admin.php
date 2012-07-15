<?php

/*
 * Set up admin route
 */
Slim::get('/admin', function () {
	// Set up a couple random variables to pass to the view...
	$title = "Hi I'm in the Administration ZONE";
	$body = "Yes You are Dude!";
	$db = getConnection();

	// Get the main javascripts
	$scripts = getMainScripts(); 
	$assets = array(
		'scripts' => $scripts,
	);

	// Set data to be passed to the view template
	Slim::view()->setData(array('title' => $title, 'body' => $body, 'assets' => $assets));
	
	// Tell Slim/Twig which template to render for this route
    Slim::render('page.html');
});
