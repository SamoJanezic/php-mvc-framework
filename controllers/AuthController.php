<?php

namespace app\controllers;

use samojanezic\phpmvc\Controller;
use samojanezic\phpmvc\middlewares\AuthMiddleware;


class AuthController extends Controller
{
	public function __construct()
	{
		$this->registerMiddleware(new AuthMiddleware(['profile']));
		$this->registerMiddleware(new AuthMiddleware(['create']));
		$this->registerMiddleware(new AuthMiddleware(['ownPosts']));
		$this->registerMiddleware(new AuthMiddleware(['editPost']));
	}

}