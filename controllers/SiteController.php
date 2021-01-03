<?php

namespace app\controllers;

use thecore\phpmvc\Application;
use thecore\phpmvc\Controller;
use thecore\phpmvc\Request;
use thecore\phpmvc\Response;
use app\models\ContactForm;

class SiteController extends Controller { 
    public function home() {
        $params = [
            'name' => "Melki"
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response) {
        $contactForm = new ContactForm();
        if($request->isPost()) {
            $contactForm->loadData($request->getBody());
            if($contactForm->validate() && $contactForm->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', ['model' => $contactForm]);
    }    
}