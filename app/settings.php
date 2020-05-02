<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            // API
            'api' => [
                'version' => 'v1',
                'base_url' => 'http://localhost',
            ],

            // Database
            'db' => [
                'dsn' => 'sqlite',
                'database' => __DIR__ . '/course_reviews.db',
            ],
        ],
    ]);
};
