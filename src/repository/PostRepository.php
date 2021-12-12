<?php

namespace App\repository;

use App\Database;
use App\model\Post as ModelPost;
use App\model\Author as ModelAuthor;

class PostRepository extends Database
{

    //Connection A la base de donnée
    public function getPosts()
    {
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
        $post->setImage( $row['image']);

        return $post;
    }

    public function getAuthor(int $authorId)
    {
        $prep = $this->createquery('SELECT * FROM author WHERE id = :authorID',
            [':authorID' => $authorId]
        );
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

    public function create(array $data = [])
    {
        if (!empty($_FILES['image']['name'])) {
            $var1 = rand(1111,9999);
            $file = $data['id'].$var1.$_FILES['image']['name'];
            $folder = "assets/images/posts/";
            $new_file_name = strtolower($file);
            $final_file = str_replace(' ','-',$new_file_name);
            $file_loc = $_FILES['image']['tmp_name'];

            if (move_uploaded_file($file_loc,$folder.$final_file)) {
                $this->createQuery(
                    'INSERT INTO post (title, content, createdAt, authorID ,image) VALUES (:title, :content, :createdAt, :authorId, :image)',
                    [
                        'title' => $data['title'],
                        'content' => $data['content'],
                        'createdAt' => (new \DateTime())->format('Y-m-d H:i:s'),
                        'authorId' => $data['id'],
                        'image' => $final_file,
                    ]
                );

                header('Location: index.php?route=sucess&resquest=created');
                exit();
            }
        }
        else{
            echo "<script>alert(\"Sorry add an image to complete your post!\")</script>";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?route=create">';


        }
    }

    public function update(array $data = [])
    {
        if (!empty($_FILES['image']['name'])) {
            $var1 = rand(1111,9999);
            $file = $data['id'].$var1.$_FILES['image']['name'];
            $folder = "assets/images/posts/";
            $new_file_name = strtolower($file);
            $final_file = str_replace(' ','-',$new_file_name);
            $file_loc = $_FILES['image']['tmp_name'];

            if (move_uploaded_file($file_loc,$folder.$final_file)) {
                $this->createQuery(
                    'UPDATE `post` SET title=:title, content=:content, createdAt=:createdAt, updateAt=:updateAt, image=:image WHERE id=:id ',
                    [
                        'title' => $data['title'],
                        'content' => $data['content'],
                        'createdAt' => $data['createdAt'],
                        'updateAt' => $data['updateAt'],
                        'image' => $final_file,
                        'id' => $data['id'],
                    ]
                );
                header('Location: index.php?route=sucess&resquest=updated');
                exit();
            }
        }
        else{
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
    }

    // public function delete(array $data = [])
    // {
    //     $this->createQuery(
    //         // title=:title, content=:content, createdAt=:createdAt, 
    //         'DELETE FROM post WHERE id=:id ',
    //         [
    //             // 'title' => $data['title'],
    //             // 'content' => $data['content'],
    //             // 'createdAt' => $data['createdAt'],
    //             // 'deletedAt' => $data['delatedAt'],
    //             'id' => $data['id'],
    //         ]
    //     );
    //     header('Location: index.php?route=sucess&resquest=deleted');
    //     exit();
    // }
    public function delete(array $data = [])
    {
        $this->createQuery(
            // title=:title, content=:content, createdAt=:createdAt, 
            'UPDATE `post` SET title=:title, content=:content, createdAt=:createdAt, deletedAt=:deletedAt WHERE id=:id ',
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'createdAt' => $data['createdAt'],
                'deletedAt' => $data['deletedAt'],
                'id' => $data['id'],
            ]
        );
        header('Location: index.php?route=sucess&resquest=deleted');
        exit();
    }
}