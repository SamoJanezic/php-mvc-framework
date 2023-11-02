<?php

namespace app\models;

use samojanezic\phpmvc\PostModel;
use samojanezic\phpmvc\Application;

class CreateForm extends PostModel
{
    public string $title = '';
    public string $content = '';
    public string $image = '';
    public string $user_id = '';

    public static function tableName(): string
	{
		return 'posts';
	}

	public function primaryKey(): string
	{
		return 'id';
	}

    public function attributes(): array
	{
		return ['title', 'content', 'image', 'user_id'];
	}

    public function greet() :string
    {
        return 'hello';
    }

    public function rules(): array
    {
        return [
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

    public function save()
    {
		$this->user_id = Application::$app->user->getId();
		return parent::save();
    }
}