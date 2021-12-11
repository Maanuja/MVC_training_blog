<?php

namespace App;

use App\controller\PostController;

class Router
{
    public function run()
    {
        $route = $_GET['route'] ?? null;
        $action = $_GET['action'] ?? null;
        $postController = new PostController();
        if (isset($_GET['route'])) {
            if ('post' === $route && $action) {
                if ('create' === $action) {
                    return $postController->create();
                } elseif ('read' === $action && isset($_GET['id'])) {
                // :var_dump($_GET['id']);die;
                    return $postController->read($_GET['id']);
                }
                elseif ('update' === $action && isset($_GET['id'])) {
                    // :var_dump($_GET['id']);die;
                    // require('src/view/dramaUpdate.php');
                    $postController->update($_GET['id']);
                } elseif ('delete' === $action && isset($_GET['id'])) {
                    // :var_dump($_GET['id']);die;
                    // require('src/view/dramaUpdate.php');
                    $postController->delete($_GET['id']);
                } 
            } elseif ('contact' === $route) {
                require('src/view/contact.php');

                // $postController->showContact();
                return $postController->sendContact();

            }elseif ('aboutus' === $route) {
                require('src/view/aboutus.php');
            }elseif ('drama' === $route) {
                // var_dump('drama');
                $postController->showDrama();
            } elseif ('create' === $route ) {
                $postController->ShowCreate();        
            } elseif ('login' === $route ) {
                require('src/view/user/login.php');
                return $postController->loginUser();
            } elseif ('signin' === $route ) {
                require('src/view/user/signin.php');
                return $postController->signUser();
            } elseif ('logout' === $route ) {
                require('src/view/user/logout.php');
            } elseif ('sucess' === $route ) {
                require('src/view/sqlanswer/succes.php');
            } elseif ('account' === $route ) {
                require('src/view/user/account.php');
                return $postController->changePassword();

            }
            
        }
        else {
            require('src/view/home.php');
        }
        // else
        // {
        //     header('Status: 404 Not Found');
        //     echo '<html><body><h1>Page Not Found</h1></body></html>';
        // }
    }
}