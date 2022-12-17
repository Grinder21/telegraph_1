<?php
    require_once 'vendor/autoload.php';

    function autoloadEntities($fileName)
    {
        require_once './entities' . $fileName . '.php';
    }

    spl_autoload_register('autoloadEntities');
