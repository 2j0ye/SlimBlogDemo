<?php

/*
 * Set up admin route
 */
$app->get('/admin', function () use($app) {
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
