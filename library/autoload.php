<?php

    
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