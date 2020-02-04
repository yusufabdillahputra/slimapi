<?php

namespace App\Controllers\Api;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

class LandingController {

    public function index(Request $request, Response $response) : Response
    {
        $payload = [
            'Message' => "Hello Dunia"
        ];
        return $response->withJson($payload, StatusCode::HTTP_OK);
    }

}
