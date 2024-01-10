<?php

namespace app\controllers;

use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Request;
use samojanezic\phpmvc\Response;
use app\models\LoginForm;


class LoginController extends AuthController
{
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

    public function logout(Request $request, Response $response)
	{
		Application::$app->logout();
		$response->redirect('/');
	}
}