<?php

namespace app\controllers;

use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Controller;
use samojanezic\phpmvc\Request;
use samojanezic\phpmvc\Response;
use app\models\ContactForm;
use app\models\Post;

class SiteController extends Controller
{
	public function home()
	{
		$post = new Post;
		$params = [
			'name' => "the Code blog",
			'allPosts' => $post->getPosts(),
		];
		return $this->render('home', $params);
	}

	public function contact(Request $request, Response $response)
	{
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

	public function postPage(Request $request)
	{
		$post = new Post;

		$payLoad = $request->getBody();
		$load = $post->getPosts('url_name' ,$payLoad['url_name']);
		$params = [
			'title' => $load[0]->title,
			'content' => $load[0]->content,
			'image' => $load[0]->image
		];

		return $this->render('/postPage', $params);
	}
}