<?php

/*
 * Set up default route
 */
$app->get('/', function () use ($app) {
	$db = getDbConnection();

	// Set up a couple random variables to pass to the view...
	$dataset = getCommonDataSet();
	$dataset['title'] = "Home Page";
	$dataset['body'] = "<p>Something to display in the body</p>";

	// Set data to be passed to the view template
	$app->view()->setData($dataset);
	
	// Tell Slim/Twig which template to render for this route
    $app->render('page.html');
});

/**
 * Set up the custom Not Found Render
 */
$app->notFound(function () use ($app) {
    // Set up a couple random variables to pass to the view...
    $dataset = getCommonDataSet();
    $dataset['title'] = "Wrong way";
    $dataset['body'] = "<p>There's nothing for you here.<br />Then move along Dude!</p>";

    // Set data to be passed to the view template
    $app->view()->setData($dataset);

    // Tell Slim/Twig which template to render for this route
    $app->render('page.html');
});