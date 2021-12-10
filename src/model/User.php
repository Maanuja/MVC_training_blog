<?php

namespace App\model;

class User
{
    private  $id;
    private  $firstname;
    private  $lastname;
    private $email;
    private  $telephone;
    private $password;

    public function getUId(): int
    {
        return $this->id;
    }

    public function setUId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
 
    public function getUFirstname() :string
    {
        return $this->firstname;
    }

    public function setUFirstname( string $firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getULastname() :string
    {
        return $this->lastname;
    }

    public function setULastname( string $lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getUEmail() :string
    {
        return $this->email;
    }
 
    public function setUEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }
 
    public function getUTelephone() :int
    {
        return $this->telephone;
    }

    public function setUTelephone(int $telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getUPassword() :string
    {
        return $this->password;
    }

    public function setUPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }
}
