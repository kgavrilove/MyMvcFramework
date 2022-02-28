<?php

namespace App\Tools;

interface IObjectList
{
    public function add(object $object);

    public function all();
}