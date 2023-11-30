<?php
/** @var $model \app\models\Post */


namespace app\models;

use samojanezic\phpmvc\PostModel;
use samojanezic\phpmvc\Application;


class Post extends PostModel
{
	public string $title = '';
	public string $content = '';
	public string $image = '';
	public string $user_id = '';
	public string $url_name = '';


	public static function tableName(): string
	{
		return 'posts';
	}

	public function primaryKey(): string
	{
		return 'id';
	}

	public function getUrlName()
	{
		$title = strtolower(str_replace(' ', '-', $this->title));
		if (filter_var('/' . $title, FILTER_VALIDATE_URL)) {
			echo("is a valid URL");
		} else {
			echo ("not a valid URL");
		}
		var_dump($title);
		$rand = sha1(microtime(true).mt_rand(10000,90000));
	}

	public function rules(): array
	{
		return  [
			'title' => [self::RULE_REQUIRED],
			'content' => [self::RULE_REQUIRED],
			'image' => [self::RULE_REQUIRED]
		];
	}

	public function labels(): array
    {
        return [
            'title' => 'Enter post title',
            'content' => 'Enter post content',
            'image' => 'Enter image link'
        ];
    }

	public function attributes(): array
	{
		return ['title', 'content', 'image', 'user_id'];
	}

	public function greet() :string
    {
        return "hello ";
    }

	public function save()
    {
		$this->user_id = Application::$app->user->getId();
		return parent::save();
    }

	public function getPosts($column = false, $id = false)
	{
		return parent::showAll($column, $id);
	}

	public function getPublisher($userID)
	{
		return parent::showPublisher($userID);
	}

	public function editPost()
	{
		return parent::editRow();
	}

	public function deletePost($id)
	{
		return parent::deleteRow($id);
	}
}
