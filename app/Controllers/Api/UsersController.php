<?php

namespace App\Controllers\Api;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;
use App\Models\UsersModel;

class UsersController
{
    private $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function readAll (Request $request, Response $response) : Response {
        $payload = $this->usersModel->readAll();
        return $response->withJson($payload,StatusCode::HTTP_OK);
    }

    /**
     * todo : Ketika menggunakan Laravel ORM , PostgreSQL ketika menggunakan timestamp memberikan
     *        Output dengan microsecond yang membuat Carbon Error Trailing ,
     *        Bagaimana solusinya apabila menggunakan ORM ?
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function readAllOrm (Request $request, Response $response) : Response
    {
        return $response->withJson(UsersModel::all(),StatusCode::HTTP_OK);
    }

}