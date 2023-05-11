<?php

namespace app\controllers;

use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Controller;
use samojanezic\phpmvc\Request;
use samojanezic\phpmvc\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
	public function home()
	{
		$params = [
			'name' => "code blog"
		];
		return $this->render('home', $params);
	}

	public function contact(Request $request, Response $response)
	{
		// var_dump($request->isPost());
		$contact = new ContactForm();
		if ($request->isPost()) {
			$contact->loadData($request->getBody());
			if ($contact->validate() && $contact->send()) {
				Application::$app->session->setFlash('success', 'Thanks for contacting us.');
				return $response->redirect('/contact');
			}
		}
		return $this->render('contact', [
			'model' => $contact,
		]);
	}
}