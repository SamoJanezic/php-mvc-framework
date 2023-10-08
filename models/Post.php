<?php

namespace app\models;

use samojanezic\phpmvc\PostModel;

class Post extends PostModel
{
	public string $title = '';
	public string $content = '';
	public string $image = '';

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
			'image' => [self::RULE_REQUIRED]
		];
	}

	public function attributes(): array
	{
		return ['firstname', 'lastname', 'email', 'password', 'status'];
	}

	public function labels(): array
	{
		return [
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'email' => 'E-mail',
			'password' => 'Password',
			'confirmPassword' => 'Confirm Password',
		];
	}
    
	public function greet() :string
    {
        return "hello ";
    }

	public function getAllPosts()
	{
		return parent::showAll();
	}

	public function getPublisher($userID)
	{
		// echo "hello";
		return parent::showPublisher($userID);
	}
}
