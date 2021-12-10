<?php

namespace App\model;

class Author
{
    private  $id;
    private  $firstname;
    private  $lastname;
    private $email;
    private  $telephone;
    private $password;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
 
    public function getFirstname() :string
    {
        return $this->firstname;
    }

    public function setFirstname( string $firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname() :string
    {
        return $this->lastname;
    }

    public function setLastname( string $lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail() :string
    {
        return $this->email;
    }
 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }
 
    public function getTelephone() :int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPassword() :string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }
}
