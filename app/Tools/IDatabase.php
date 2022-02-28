<?php

namespace App\Tools;

interface IDatabase
{
    public function select($sql, $array , $fetchMode );

    public function insert($table, $data);


}