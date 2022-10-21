<?php 
use Dotenv\Dotenv;
//add your namespace here
//this will be your project's entry point.
require_once realpath(__DIR__ . '/vendor/autoload.php');

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

?>