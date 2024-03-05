<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $fillable = ['username', 'password'];

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = Hash::make($password);
    }

    public function getPassword()
    {
        return $this->password;
    }
}
