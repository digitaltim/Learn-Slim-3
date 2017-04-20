<?php

require 'vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();

$container['greeting'] = function () {
	echo 'Home';
	return 'Hello from the container';
};

$app->get('/', function () {
	echo $this->greeting;
	echo $this->greeting;
	echo $this->greeting;
});

$app->run();