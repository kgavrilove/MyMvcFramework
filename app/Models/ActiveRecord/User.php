<?php

namespace App\Models\ActiveRecord;

use App\Models\ActiveRecord\Model;
use App\Tools\ObjectList;
use App\Tools\UserList;


class User extends Model
{
    protected string $table='users';
    private int $id;
    private string $login;
    private string $password;


    public function getId() :int
    {
        return $this->id;
    }

    public function getLogin() :string
    {
        return $this->login;
    }

    public function getPassword() :string
    {
        return $this->password;
    }

    public function setId(int $id) :void
    {
        $this->id=$id;
    }

    public function setLogin(string $login) :void
    {
        $this->login=$login;
    }

    public function setPassword(string $password) :void
    {
        $this->password=$password;
    }

    public function create(array $data) :User
    {
        $response= $this->db->insert($this->table,$data);

        return $this->getById($response);

    }

    public function getAll() :ObjectList
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

    public function getById(string $id) :User
    {
        $response=$this->db->select('SELECT * FROM '.$this->table.' WHERE users.id='.$id);

        $user=new User();
        $user->setId($response[0]['id']);
        $user->setLogin($response[0]['login']);
        $user->setPassword($response[0]['password']);
        return $user;
    }

}