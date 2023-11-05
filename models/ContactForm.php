<?php

namespace app\models;

use samojanezic\phpmvc\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $conent = '';

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'content' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter your subject',
            'email' => 'Enter your Email',
            'body' => 'Enter Your content',
        ];
    }

    public function send()
    {
        return true;
    }
}