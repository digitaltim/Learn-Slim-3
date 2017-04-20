<?php

require 'vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	]
]);

$container = $app->getContainer();

$container['greeting'] = function () {
	echo 'Home';
	return 'Hello from the container';
};

$app->get('/', function () {
	echo $this->none;
});

$app->run();