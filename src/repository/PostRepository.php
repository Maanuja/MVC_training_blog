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
        $this->createQuery(
            'INSERT INTO post (title, content, createdAt, authorID) VALUES (:title, :content, :createdAt, :authorId)',
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'createdAt' => (new \DateTime())->format('Y-m-d H:i:s'),
                'authorId' => $data['id'],
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

