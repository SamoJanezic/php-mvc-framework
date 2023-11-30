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

	public function clean($string)
	{
		$string = strtolower(str_replace(' ', '-', $string)); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9]-/', '', $string); // Removes special chars.
	}

	public function getUrlName($string, $l)
	{
		$string = $this->clean($string);
		$unique = substr(md5(uniqid(mt_rand(), true)), 0, $l);
		return $string . '-' . $unique;
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
		return ['title', 'content', 'image', 'user_id', 'url_name'];
	}

	public function greet() :string
    {
        return "hello ";
    }

	public function save()
    {
		$this->url_name = $this->getUrlName($this->title, 8);
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
