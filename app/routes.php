<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Model\Course as Course;

return function (App $app) {
    $app->get('/[{name}]', function (Request $request, Response $response, array $args) {
        //THE ERROR IS HERE - NEW Course vs $this...
        // $course = new Course();
        // $result = $course->getCourses();
        $result = $this->course->getCourses();
        return $response->withJson($result, 200, JSON_PRETTY_PRINT);
    });
};
