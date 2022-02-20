<?php

namespace App\Models\DataMapper;

use App\Tools\Database;

class Mapper
{
    public function __construct(){
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }
}