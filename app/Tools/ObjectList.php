<?php

namespace App\Tools;

use App\Models\ActiveRecord\User;

class ObjectList
{
    private $list;

    public function __construct()
    {

    }

    public function add( $object)
    {
        $this->list[]=$object;
    }
    public function all()
    {
        return $this->list;
    }
}