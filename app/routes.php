<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/[{name}]', function (Request $request, Response $response, array $args) {
        $result = $this->course->getCourses();
        return $response->withJson($result, 200, JSON_PRETTY_PRINT);
    });
};
