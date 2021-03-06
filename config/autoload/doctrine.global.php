<?php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'host' => '10.0.75.1',
                    'posrt' => '3306',
                    'user' => 'root',
                    'password' => 'sandbox',
                    'dbname' => 'codeemailmkt',
                    'driverOptions' => [
                        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
                    ]
                ]
            ]
        ],
        'driver' => [
            'App_driver' => [
                'class' => Doctrine\ORM\Mapping\Driver\YamlDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../../src/App/Infrastructure/Persistence/Doctrine/ORM',
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'App\Domain\Entity' => 'App_driver'
                ]
            ]
        ]
    ]
];