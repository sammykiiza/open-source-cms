<?php
declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\DBAL\Types\Type;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// or if you prefer yaml or XML
// $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array('url' => 'mysql://root:root@localhost/open-source-cms?charset=UTF8');

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

//setup custom mapping type
Type::addType('value_id', 'App\Infrastructure\Persistence\Doctrine\Type\IdType');
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('value_id', 'value_id');

Type::addType('email_address', 'App\Infrastructure\Persistence\Doctrine\Type\EmailAddressType');
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('email_address', 'email_address');

Type::addType('date_time', 'App\Infrastructure\Persistence\Doctrine\Type\DateTimeType');
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('date_time', 'date_time');