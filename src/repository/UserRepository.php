<?php

namespace App\repository;

use App\Database;


class UserRepository extends Database
{
    public function signUser(array $data = []){
        $stmt = $this->createQuery(
            'SELECT email FROM author WHERE email=:email',
            [
                'email' => $data['mail'],
            ]
        ); 
        $user = $stmt->fetch();
        if($user){
            // echo 'User already exist with this mail:(.';
            echo "<script>alert(\"User already exist with this mail:(\")</script>";
        }
        if (!($user)){
            $log =$this->createQuery(
                'INSERT INTO author (firstname, lastname, email, phone, mdp) VALUES (:firstname, :lastname, :email, :phone, :mdp)',
                [
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['mail'],
                    'phone' => $data['tel'],
                    'mdp' => $data['mdp'],
                ]
            );
            echo "<script>alert(\"User created!\")</script>";
        }
    }

    public function loginUser(array $data = []){
        if (isset($data['mail']) && isset($data['mdp'])) {
            $resultats = $this->createQuery(
                'SELECT * FROM author',
                [
                ]
            );
            while($ligne = $resultats->fetch())
            {
                $login = $ligne['email'];
                $pwd = $ligne['mdp'];
            
                // Verify form, mail exist, same for mdp
                if ($login == $data['mail'] && $pwd == $data['mdp']) {
                    // register param of user ($mail et $mdp) 
                    $_SESSION['mail'] = $data['mail'];
                    $_SESSION['mdp'] = $data['mdp'];


                    //user info
                    $num = $this->createQuery(
                        'SELECT * FROM author WHERE email=:mail ',
                        [
                            'mail' => $login,
                        ]
                    );

                    $infoClient = $num->fetch();

                    $_SESSION['id'] = $infoClient[0];
                    $_SESSION['firstname'] = $infoClient[1];
                    $_SESSION['lastname'] = $infoClient[2];
                    $_SESSION['mail'] = $infoClient[3];
                    $_SESSION['phone'] = $infoClient[4];
                    $_SESSION['mdp'] = $infoClient[5];
                    // redirect user to account
                    echo '<meta http-equiv="refresh" content="0;URL=index.php?route=account">';
                    break;
                }
                else {
                    // redirect to login with mgs
                    echo '<meta http-equiv="refresh" content="0;URL=index.php?route=login&con=non">';
                }
            }
        }
        else {
            echo "<script>alert(\"Fill the form!\")</script>";
        }
    }
}