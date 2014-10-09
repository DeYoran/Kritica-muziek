<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Load entity configuration from PHP file annotations
// This is the most versatile mode, I advise using it!
// If you don't like it, Doctrine also supports YAML or XML
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

// Set up database connection data
$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'ORM',
    'user'     => 'root',
    'password' => ''
);

$entityManager = EntityManager::create($conn, $config);

function __autoload($className)
    {
        $d = DIRECTORY_SEPARATOR;
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = strtolower(str_replace('\\', $d, $namespace) . $d);
        }
        $fileName = "./" . $fileName . str_replace('_', $d, ucfirst($className)) . '.php';

        require_once $fileName;
    }