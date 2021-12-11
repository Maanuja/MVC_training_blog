<?php

namespace App\repository;
use App\model\User as ModelUser;

use App\Database;


class UserRepository extends Database
{
    public function getUser(string $mail)
    {
        $prep = $this->createquery('SELECT * FROM author WHERE email = :mail',
            [':mail' => $mail]
        );
        return $this->builtUser($prep->fetch());
    }

    private function builtUser(array $row): ModelUser
    {
        $user = new ModelUser;
        $user->setuId((int) $row['id']);
        $user->setuFirstname((string)$row['firstname']);
        $user->setuLastname((string)$row['lastname']);
        $user->setuEmail((string) $row['email']);
        $user->setuTelephone( $row['phone']);
        $user->setuPassword((string) $row['mdp']);
        // var_dump($user);
        return $user;
    }

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

    public function changePassword(array $data = []){
        
        $oldmdp=$data['oldmdp'];
        $newmdp=$data['newmdp'];        
        $cofmdp=$data['cofmdp'];
        if(($oldmdp==$data['pwd']) && ($newmdp==$cofmdp))
        {
            $this->createQuery(
            'UPDATE author SET mdp= :newmdp WHERE id=:id ',
            [
                'newmdp' => $newmdp,
                'id' => $data['id'],
            ]
        );
        echo '<meta http-equiv="refresh" content="0;URL=index.php?route=sucess&resquest=mdpchanged">';
        exit;
        }
        elseif ($oldmdp!=$data['pwd']) {
            echo "<script>alert(\"ancien mdp incorrect :(\")</script>";

        }
        elseif ($newmdp!=$cofmdp) {
            echo "<script>alert(\"Les mots de passe ne sont pas identiques :5\")</script>";

        }
    }
}