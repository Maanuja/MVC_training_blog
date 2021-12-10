<?php

namespace App\repository;

use App\Database;
use App\model\Post as ModelPost;
use App\model\Author as ModelAuthor;
use App\model\User as ModelUser;


class PostRepository extends Database
{

    //Connection A la base de donnée
    public function getPosts()
    {
        // $connection = (new Database())->getConnection();
        // return $connection->query('SELECT * FROM post');
        return $this->getConnection()->query('SELECT * FROM post');
    }


    public function getPost(int $id)
    {
        $result = $this->createQuery(
            'SELECT * FROM post WHERE id = :postId',
            ['postId' => $id]
        );
        
        return $this->builtPost($result->fetch());
    }

    private function builtPost(array $row): ModelPost
    {
        $post = new ModelPost;
        $post->setId((int) $row['id']);
        $post->setTitle($row['title']);
        $post->setContent($row['content']);
        $post->setCreatedAt(new \DateTime($row['createdAt']));
        $post->setUpdatedAt(isset($row['updatedAt']) ? new \DateTime($row['updatedAt']) : null);
        $post->setDeletedAt(isset($row['deletedAt']) ? new \DateTime($row['deletedAt']) : null);
        $post->setAuthorId((int) $row['authorID']);

        return $post;
    }

    public function getAuthor(int $authorId)
    {
        // $connection = (new Database())->getConnection();
        $prep = $this->createquery('SELECT * FROM author WHERE id = :authorID',
            // $prep = $connection->prepare('SELECT firstname,lastname FROM author WHERE id = :authorID');
            [':authorID' => $authorId]
        );
        // return $prep->fetch();
        return $this->builtAuthor($prep->fetch());
    }

    private function builtAuthor(array $row): ModelAuthor
    {
        $author = new ModelAuthor;
        $author->setId((int) $row['id']);
        $author->setFirstname((string)$row['firstname']);
        $author->setLastname((string)$row['lastname']);
        $author->setEmail((string) $row['email']);
        $author->setTelephone((int) $row['phone']);
        // var_dump($author);
        return $author;
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

    // public function getUser(int $mail)
    // {
    //     // $connection = (new Database())->getConnection();
    //     $prep = $this->createquery('SELECT * FROM author WHERE email = :mail',
    //         // $prep = $connection->prepare('SELECT firstname,lastname FROM author WHERE id = :authorID');
    //         [':email' => $mail]
    //     );
    //     // return $prep->fetch();
    //     return $this->builtUser($prep->fetch());
    // }

    // private function builtUser(array $row): ModelUser
    // {
    //     $user = new ModelUser;
    //     $user->setUId((int) $row['id']);
    //     $user->setUFirstname((string)$row['firstname']);
    //     $user->setULastname((string)$row['lastname']);
    //     $user->setUEmail((string) $row['email']);
    //     $user->setUTelephone((int) $row['phone']);
    // }

    public function create(array $data = [])
    {
        $this->createQuery(
            'INSERT INTO post (title, content, createdAt, authorID) VALUES (:title, :content, :createdAt, :authorId)',
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'createdAt' => (new \DateTime())->format('Y-m-d H:i:s'),
                'authorId' => $_SESSION['id'],
            ]
        );
        header('Location: index.php?route=sucess&resquest=created');
        exit();
    }

    public function update(array $data = [])
    {
        $this->createQuery(
            'UPDATE `post` SET title=:title, content=:content, createdAt=:createdAt, updateAt=:updateAt WHERE id=:id ',
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'createdAt' => $data['createdAt'],
                'updateAt' => $data['updateAt'],
                'id' => $data['id'],
            ]
        );
        header('Location: index.php?route=sucess&resquest=updated');
        exit();
    }

    public function delete(array $data = [])
    {
        $this->createQuery(
            // title=:title, content=:content, createdAt=:createdAt, 
            'DELETE FROM post WHERE id=:id ',
            [
                // 'title' => $data['title'],
                // 'content' => $data['content'],
                // 'createdAt' => $data['createdAt'],
                // 'deletedAt' => $data['delatedAt'],
                'id' => $data['id'],
            ]
        );
        header('Location: index.php?route=sucess&resquest=deleted');
        exit();
    }
}

