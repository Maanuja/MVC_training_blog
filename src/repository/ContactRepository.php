<?php

namespace App\repository;

use App\Database;

class ContactRepository extends Database
{
    public function sendContact(array $data = [])
    {
        $this->createQuery(
            'INSERT INTO contact(nom, prenom, tel, msg, email) VALUES (:nom, :prenom, :tel, :msg, :email)',
                       [
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'tel' => $data['tel'],
                'msg' => $data['message'],
                'email' => $data['email'],
            ]
        );
        echo "<script>alert(\"Your Message got safely to us!\")</script>";

    }
}