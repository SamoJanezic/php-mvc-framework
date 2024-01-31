<?php

namespace app\controllers;

use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Request;
use samojanezic\phpmvc\Helpers;
use app\models\User;

class RegisterController extends AuthController
{
    public function register(Request $request)
	{
		$user = new User();
		if ($request->isPost()) {
			if (Helpers::fileIsGiven('user_pic')) {
				$user->user_pic = Helpers::uploadImage('user_pic', 'images/');
			} else {
				$user->user_pic = 'assets/no-image.png';
			}
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
}