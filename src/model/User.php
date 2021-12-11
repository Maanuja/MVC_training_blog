<?php

namespace App\model;

class User
{
    private  $idu;
    private  $ufirstname;
    private  $ulastname;
    private $uemail;
    private  $utelephone;
    private $upassword;

    public function getuId(): int
    {
        return $this->idu;
    }

    public function setuId(int $idu): self
    {
        $this->idu = $idu;

        return $this;
    }
 
    public function getuFirstname() :string
    {
        return $this->ufirstname;
    }

    public function setuFirstname( string $ufirstname)
    {
        $this->ufirstname = $ufirstname;

        return $this;
    }

    public function getuLastname() :string
    {
        return $this->ulastname;
    }

    public function setuLastname( string $ulastname)
    {
        $this->ulastname = $ulastname;

        return $this;
    }

    public function getuEmail() :string
    {
        return $this->uemail;
    }
 
    public function setuEmail(string $uemail)
    {
        $this->uemail = $uemail;

        return $this;
    }
 
    public function getuTelephone()
    {
        return $this->utelephone;
    }

    public function setuTelephone( $utelephone)
    {
        $this->utelephone = $utelephone;

        return $this;
    }

    public function getuPassword() :string
    {
        return $this->upassword;
    }

    public function setuPassword(string $upassword)
    {
        $this->upassword = $upassword;

        return $this;
    }
}
