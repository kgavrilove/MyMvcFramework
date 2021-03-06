<?php

namespace App\Models\DataMapper;

use App\Tools\ObjectList;

class UserMapper extends Mapper
{
    protected $table='users';

    public function create(array $data) :DMUser
    {
        $response= $this->db->insert($this->table,$data);

        return $this->getById($response);

    }

    public function getAll() :ObjectList
    {
        $response=$this->db->select('SELECT * FROM '.$this->table);
        $list=new ObjectList();
        foreach ($response as $row){
            $user= new DMUser();
            $user->setId($row['id']);
            $user->setPassword($row['password']);
            $user->setLogin($row['login']);
            $list->add($user);
        }
        return $list;
    }

    public function getById(int $id) :DMUser
    {
        $response=$this->db->select('SELECT * FROM '.$this->table.' WHERE users.id='.$id);

        $user=new DMUser();
        $user->setId($response[0]['id']);
        $user->setLogin($response[0]['login']);
        $user->setPassword($response[0]['password']);
        return $user;
    }

}