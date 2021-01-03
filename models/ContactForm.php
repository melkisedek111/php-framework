<?php

namespace app\models;

use thecore\phpmvc\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    public function send() {
        return true; 
    }

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels():array
    {
        return [
            'subject' => 'Subject',
            'email' => 'Subject',
            'body' => 'Body',
        ];
    }
}
