<?php

    function loaderFileStorageLib($className)
    {
        require_once './entities' . $className . '.php';
    }

    function loaderStorageLib($className)
    {
        require_once './entities' . $className . '.php';
    }

    function loaderTelegraphTextLib($className)
    {
        require_once './entities' . $className . '.php';
    }

    function loaderTextLib($className)
    {
        require_once './entities' . $className . '.php';
    }

    function loaderUserLib($className)
    {
        require_once './entities' . $className . '.php';
    }

    spl_autoload_register('loaderFileStorageLib');
    spl_autoload_register('loaderStorageLib');
    spl_autoload_register('loaderTelegraphTextLib');
    spl_autoload_register('loaderTextLib');
    spl_autoload_register('loaderUserLib');