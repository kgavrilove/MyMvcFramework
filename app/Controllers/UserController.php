<?php

namespace App\Controllers;

use App\Models\ActiveRecord\User;
use App\Models\DataMapper\UserMapper;
use Symfony\Component\Routing\RouteCollection;

class UserController
{
    public function index()
    {
      /* $user= new User();
        $users=$user->getAll();
        print_r($users);*/

        $user_mapper= new UserMapper();
        $user=$user_mapper->getById(4);
        print_r($user);
        require_once APP_ROOT. '/views/Page.php';
    }

}