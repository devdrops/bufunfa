<?php

namespace Bufunfa\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class LogProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        
    }

    public function logRequest()
    {
        $dbConnection->query(
            "INSERT INTO requests () VALUES ;"
        );
    }

    public function logException()
    {
        $dbConnection->query(
            "INSERT INTO exceptions () VALUES ;"
        );
    }
}

