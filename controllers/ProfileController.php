<?php

namespace app\controllers;
class ProfileController extends AuthController
{
    public function profile()
	{
		return $this->render('profile');
	}
}