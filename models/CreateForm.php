<?php

namespace app\models;

use samojanezic\phpmvc\Model;

class CreateForm extends Model
{
    public string $title = '';
    public string $body = '';
    public string $image = '';

    public function rules(): array
    {
        return [
            'title' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
            'image' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'title' => 'Enter post title',
            'body' => 'Enter post body',
            'image' => 'Enter image link'
        ];
    }

    public function send()
    {
        return true;
    }
}