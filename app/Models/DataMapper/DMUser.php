<?php

namespace App\Models\DataMapper;


class DMUser
{
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
}