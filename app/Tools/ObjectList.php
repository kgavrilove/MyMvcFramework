<?php

namespace App\Tools;

use App\Models\ActiveRecord\User;

class ObjectList implements IObjectList
{
    private $list;

    public function __construct()
    {

    }

    public function add(object $object)
    {
        $this->list[]=$object;
    }
    public function all()
    {
        return $this->list;
    }
}