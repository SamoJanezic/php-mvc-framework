<?php
/** @var $model \app\models\Post */


namespace app\models;

use samojanezic\phpmvc\PostModel;
use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\Helpers;


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

	public function rules(): array
	{
		return  [
			'title' => [self::RULE_REQUIRED],
			'content' => [self::RULE_REQUIRED],
		];
	}

	public function labels(): array
    {
        return [
            'title' => 'Enter post title',
            'content' => 'Enter post content',
            'image' => 'Select image file'
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
		$this->url_name = Helpers::getUniqueName($this->title, 8);
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

	public function editPost($id)
	{
		return parent::editRow($id, $this->title, $this->content, $this->image);
	}

	public function deletePost($id)
	{
		return parent::deleteRow($id);
	}
}
