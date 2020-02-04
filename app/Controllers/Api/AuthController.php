<?php

namespace App\Controllers\Api;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;
use App\Models\UsersModel;

class AuthController
{
    private $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function signIn (Request $request, Response $response) : Response
    {

    }

    public function signOut (Request $request, Response $response) : Response
    {

    }

    public function signUp (Request $request, Response $response) : Response
    {

    }

}