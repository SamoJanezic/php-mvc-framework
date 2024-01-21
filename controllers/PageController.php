<?php

namespace app\controllers;

use samojanezic\phpmvc\Controller;
use samojanezic\phpmvc\Request;
use app\models\Post;

class PageController extends Controller
{
    public function home()
	{
		$post = new Post;
		$params = [
			'name' => "the BloJist",
			'allPosts' => $post->getPosts(),
		];
		return $this->render('home', $params);
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

	public function getPosts(Request $request)
	{
		$post = new Post;
		$posts = $post->getPosts();
		forEach($posts as $single) {
			echo json_encode($single);
		}
	}
}