<?php

$autoloadFile = __DIR__.'/../vendor/autoload.php';
require_once $autoloadFile;

use NickVeenhof\IntuoClient\Entity\Praise;
use NickVeenhof\IntuoClient\Intuo;

// The URL to the Intuo API endpoint
$url = 'https://apitest.intuo.io/';
// The APi token to authenticate against Intuo API.
$apiToken = 'XXXXX';

$client = new Intuo($apiToken, ['base_url' => $url]);

// Get all existing praises within defined constraints.
$manager = $client->getPraiseManager();
$options = ['per_page' => '25'];
$praises = $manager->query($options);

// Get a praise from the system.
$praise = $manager->get(10);
