<?php

namespace WebFramework\Mysql;

use Psr\Container\ContainerInterface;
use WebFramework\Database\DatabaseProvider;
use WebFramework\Diagnostics\Instrumentation;
use WebFramework\Security\ConfigService;

return [
    MysqliDatabase::class => function (ContainerInterface $c) {
        $secureConfigService = $c->get(ConfigService::class);

        $dbConfig = $secureConfigService->getAuthConfig('db_config.main');

        $mysql = @new \mysqli(
            $dbConfig['database_host'],
            $dbConfig['database_user'],
            $dbConfig['database_password'],
            $dbConfig['database_database']
        );

        if ($mysql->connect_error)
        {
            throw new \RuntimeException('Mysqli Database connection failed');
        }

        $database = new MysqliDatabase(
            $mysql,
            $c->get(Instrumentation::class),
        );

        $c->get(DatabaseProvider::class)->set($database);

        return $database;
    },
];
