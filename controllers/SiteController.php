<?php

namespace app\controllers;

use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Controller;
use samojanezic\phpmvc\Request;
use samojanezic\phpmvc\Response;
use app\models\ContactForm;
use app\models\CreateForm;

class SiteController extends Controller
{
	public function home()
	{
		$params = [
			'name' => "the Code blog"
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

	public function create(Request $request, Response $response)
	{
		$create = new CreateForm();
		if ($request->isPost()) {
			$contact->loadData($request->getBody());
			if ($contact->validate() && $contact->send()) {
				Application::$app->session->setFlash('success', 'Your blog has been saved.');
				return $response->redirect('/create');
			}
		}
		return $this->render('create', [
			'model' => $create,
		]);
	}
}