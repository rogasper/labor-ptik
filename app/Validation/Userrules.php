<?php

namespace App\Validation;

use App\Models\UserModel;

class Userrules
{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model  = new UserModel();
        $user   = $model->where('email', $data['email'])->first();

        if (!$user) {
            return false;
        }

        return password_verify(md5($data['password']), password_hash($user['password'], PASSWORD_DEFAULT));
    }
}
