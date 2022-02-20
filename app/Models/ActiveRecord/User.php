<?php

namespace App\Models\ActiveRecord;

use App\Models\ActiveRecord\Model;
use App\Tools\ObjectList;
use App\Tools\UserList;


class User extends Model
{
    private $table='users';
    private $id;
    private $login;
    private $password;


    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setId($id)
    {
        $this->id=$id;
    }

    public function setLogin($login)
    {
        $this->login=$login;
    }

    public function setPassword($password)
    {
        $this->password=$password;
    }

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
            $user= new User();
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

        $user=new User();
        $user->setId($response[0]['id']);
        $user->setLogin($response[0]['login']);
        $user->setPassword($response[0]['password']);
        return $user;
    }

}