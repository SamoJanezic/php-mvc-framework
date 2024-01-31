<?php

namespace app\controllers;

use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Request;
use samojanezic\phpmvc\Response;
use samojanezic\phpmvc\Helpers;
use app\models\Post;


class PostController extends AuthController
{
    public function create(Request $request, Response $response)
	{
		$create = new Post();
		if ($request->isPost()) {
			if (Helpers::fileIsGiven('image')) {
				$create->image = Helpers::uploadImage('image', 'images/');
			} else {
				$create->image = 'assets/placeholder.png';
			}
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
		$user_id = Application::$app->user->getId();
		$userPosts = $ownPost->getPosts('user_id', $user_id);
		return $this->render('ownPosts', [
			'model' => $ownPost,
			'userPosts' => $userPosts
		]);
	}

	public function delete(Request $request, Response $response)
	{
		$post = new Post();
		if ($request->isPost()) {
			$id = $request->getBody()['id'];
			$files = glob('images/*');
			$img = 'image';
			$image = $post->findOne(['id' => $id])->$img;
			if(in_array($image, $files)) {
				unlink($image);
			}
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
			if (Helpers::fileIsGiven('image')) {
				$post->image = Helpers::uploadImage('image', 'images/');
			} else {
				$post->image = $load[0]->image;
			}
			$post->loadData($request->getBody());
			$id = $request->getBody()['id'];
			$post->editPost($id);
			Application::$app->session->setFlash('success', 'Changes successfuly saved');
			return $response->redirect('/own-posts');
		}

		return $this->render('editPost',$params);
	}
}