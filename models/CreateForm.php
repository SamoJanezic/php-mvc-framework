<?php

namespace app\models;

use samojanezic\phpmvc\Model;

class CreateForm extends Model
{
    public string $title = '';
    public string $body = '';

    public function rules(): array
    {
        return [
            'title' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'title' => 'Enter your title',
            'body' => 'Enter Your body',
        ];
    }

    public function send()
    {
        return true;
    }
}