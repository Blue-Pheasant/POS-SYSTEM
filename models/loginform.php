<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels()
    {
        return [
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu'
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', self::RULE_INVALID_EMAIL);
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', self::RULE_WRONG_PASSWORD);
            return false;
        }

        return Application::$app->login($user);
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute];
    }
}