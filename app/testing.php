<?php
require_once 'factory.php';

$factory = new factory();

// Get a Circle object and call its draw method
$f1 = $factory->createRecord("LOAN");
$f1->create();

// Get a Rectangle object and call its draw method
$f1 = $factory->createRecord("LEVELSTUDY");
$f1->create();
