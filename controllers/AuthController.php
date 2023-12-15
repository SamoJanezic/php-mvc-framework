<?php

namespace app\controllers;

use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Controller;
use samojanezic\phpmvc\Request;
use samojanezic\phpmvc\Response;
use samojanezic\phpmvc\middlewares\AuthMiddleware;
use samojanezic\phpmvc\Helpers;
use app\models\User;
use app\models\LoginForm;
use app\models\Post;


class AuthController extends Controller
{
	public function __construct()
	{
		$this->registerMiddleware(new AuthMiddleware(['profile']));
		$this->registerMiddleware(new AuthMiddleware(['create']));
		$this->registerMiddleware(new AuthMiddleware(['ownPosts']));
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
		$create = new Post();
		if ($request->isPost()) {
			$create->image = Helpers::uploadImage('images/');
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

	public function ownPosts(Request $request, Response $response)
	{
		$ownPost = new Post();
		return $this->render('ownPosts', [
			'model' => $ownPost,
		]);
	}

	public function delete(Request $request, Response $response)
	{
		$post = new Post();
		if ($request->isPost()) {
			$id = $request->getBody()['id'];
			$img = 'image';
			$image = $post->findOne(['id' => $id])->$img;
			unlink($image);
			$post->deletePost($id);
			Application::$app->session->setFlash('success', 'Blog has been deleted');
			return $response->redirect('/own-posts');
		}
	}

	public function editPost(Request $request, Response $response)
	{
		$post = new Post();
		$payLoad = $request->getBody();
		$load = $post->getPosts('id', $payLoad['id']);
		$post->title = $load[0]->title;
		$post->content = $load[0]->content;
		$post->image = $load[0]->image;
		$post->id = $load[0]->id;
		$params = [
			'id' => $load[0]->id,
			'image' => $load[0]->image,
			'model' => $post
		];

		if($request->isPost()) {
			$post->image = Helpers::uploadImage('images/');
			$post->loadData($request->getBody());
			$id = $request->getBody()['id'];
			$post->editPost($id);
			Application::$app->session->setFlash('success', 'Changes successfuly saved');
			return $response->redirect('/own-posts');
		}

		return $this->render('editPost',$params);
	}
}