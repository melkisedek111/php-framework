<?php
namespace app\controllers;

use app\models\User;
use thecore\phpmvc\Request;
use thecore\phpmvc\Response;
use thecore\phpmvc\Controller;
use thecore\phpmvc\Application;
use app\models\DataModel;
use app\models\LoginForm;
use thecore\phpmvc\middlewares\AuthMiddleware;

class AuthController extends Controller {
    public function __construct() {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    public function data(Request $request) {
        $dataModel = new DataModel();
        if($request->isPost()) {
            $dataModel->loadData($request->getBody());
            echo json_encode($request->getBody());
        }

    }

    public function login(Request $request, Response $response) {
        $loginForm = new LoginForm();
        if($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                // Application::$app->login();
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', ['model' => $loginForm]);
    }
    public function register(Request $request) {
        $user = new User();
        if($request->isPost()) {
            $user->loadData($request->getBody());
            if($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for regestering');
                Application::$app->response->redirect('/');
            }
            $this->setLayout('auth');
            return $this->render('register', ['model' => $user]); 
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }



    public function logout(Request $request, Response $response) {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile() {
        
        return $this->render('profile');
    }
}