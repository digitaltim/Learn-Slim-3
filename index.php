<?php

require 'vendor/autoload.php';

// Create app
$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	]
]);

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/resources/views', [
        'cache' => false
    ]);
    
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$app->get('/', function ($request, $response, $args) {
	return $this->view->render($response, 'home.twig');
});

$app->get('/users', function ($request, $response, $args) {
	$users = [
		'Billy',
		'Bog',
		'Body'
	];
	return $this->view->render($response, 'users.twig', [
		'users' => $users,
	]);
});

$app->run();