<?php
namespace app\models;
use thecore\phpmvc\Model;
use thecore\phpmvc\Application;

class LoginForm extends Model {
    public string $email = '';
    public string $password = '';
    public function rules(): array {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }
    public function login() {
        $user = User::findOne(['email' => $this->email]);
        if(!$user) {
            $this->addError('email', 'User does not exists with this email');
            return false;
        }
        if(!password_verify($this->password, $user->password)) {
            $this->addError('password', 'User or password is incorrect');
            return false;
        }
        return Application::$app->login($user);
    }
    public function labels(): array {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}