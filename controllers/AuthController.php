<?php

namespace app\controllers;

use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Controller;
use samojanezic\phpmvc\Request;
use samojanezic\phpmvc\Response;
use app\models\User;
use app\models\LoginForm;
use samojanezic\phpmvc\middlewares\AuthMiddleware;
use app\models\CreateForm;


class AuthController extends Controller
{
	public function __construct()
	{
		$this->registerMiddleware(new AuthMiddleware(['profile']));
		$this->registerMiddleware(new AuthMiddleware(['create']));
	}

	public function login(Request $request, Response $response)
	{
		$loginForm = new LoginForm();
		if ($request->isPost()) {
			$loginForm->loadData($request->getBody());
			if ($loginForm->validate() && $loginForm->login()) {
				$response->redirect('/');
				return;
			}
		}
		$this->setLayout('auth');
		return $this->render('login', [
			'model' => $loginForm,
		]);
	}

	public function register(Request $request)
	{
		$user = new User();
		if ($request->isPost()) {
			$user->loadData($request->getBody());

			if ($user->validate() && $user->save()) {
				Application::$app->session->setFlash('success', 'Thanks for registering');
				Application::$app->response->redirect('/');
			}

			return $this->render('register', [
				'model' => $user
			]);
		}
		$this->setLayout('auth');
		return $this->render('register', [
			'model' => $user
		]);
	}

	public function logout(Request $request, Response $response)
	{
		Application::$app->logout();
		$response->redirect('/');
	}

	public function profile()
	{
		return $this->render('profile');
	}

	public function create(Request $request, Response $response)
	{
	$create = new CreateForm();
	if ($request->isPost()) {
		$create->loadData($request->getBody());
		if ($create->validate() && $create->save()) {
		Application::$app->session->setFlash('success', 'Your blog has been saved.');
		return $response->redirect('/create');
		}
	}
	return $this->render('create', [
		'model' => $create,
	]);
	}
}