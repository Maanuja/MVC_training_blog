<?php

namespace App\controller;

use App\repository\PostRepository;
use App\repository\UserRepository;

class PostController
{
    public function __construct()
    {
        $this->postRepository = new PostRepository();
        $this->userRepository = new UserRepository();

    }
    public function showDrama(){
        $this->postRepository->getPosts();
        require('src/view/drama.php');
    }
    public function showContact(){
        require('src/view/contact.php');
    }
    public function ShowCreate()
    {
        require('src/view/postLayout/dramaCreate.php');
    }

    public function signUser(){
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->userRepository->signUser($_POST);
            // var_dump($_POST);
        }
    }

    public function loginUser(){
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->userRepository->loginUser($_POST);
        }
    }
    public function changePassword(){
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->userRepository->changePassword($_POST);
        }
    }
    // CRUD POST
    public function create()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->postRepository->create($_POST);
        }
    }
    
    public function read(int $id)
    {
        $postRepository = new PostRepository();
        $post = $postRepository->getPost($id);
        // var_dump($post);
        require('src/view/postLayout/dramaRead.php');
    }

    public function update(int $id){
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->postRepository->update($_POST);
        }
        $postRepository = new PostRepository();
        $post = $postRepository->getPost($id);
        require('src/view/postLayout/dramaUpdate.php');
    }

    public function delete(int $id){
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->postRepository->delete($_POST);
        }
        $postRepository = new PostRepository();
        $post = $postRepository->getPost($id);
        require('src/view/postLayout/dramaDelete.php');
    }
}