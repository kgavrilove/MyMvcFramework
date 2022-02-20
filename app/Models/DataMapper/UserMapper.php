<?php

namespace App\Models\DataMapper;

use App\Tools\ObjectList;

class UserMapper extends Mapper
{
    private $table='users';

    public function create(array $data)
    {
        $response= $this->db->insert($this->table,$data);

        return $this->getById($response);

    }

    public function getAll()
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

    public function getById($id)
    {
        $response=$this->db->select('SELECT * FROM '.$this->table.' WHERE users.id='.$id);

        $user=new DMUser();
        $user->setId($response[0]['id']);
        $user->setLogin($response[0]['login']);
        $user->setPassword($response[0]['password']);
        return $user;
    }

}