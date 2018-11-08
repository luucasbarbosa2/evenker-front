<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use \Curl\Curl;
/**
 * Description of UsersController
 *
 * @author Lucas
 */
class UsersController extends AppController {

    //put your code here


    public function register() {
        $this->viewBuilder()->setLayout(false);
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $send = [];
            $send['object']['user'] = $data;

            $http = new Curl();
            $http->setHeader("content-type", "application/json");
            $response = $http->post("$this->base_url/users/add", $send); 
           
            $this->redirect("/users/login");
            
            echo json_encode($response);
        }
    }
    
    public function login(){
        $this->viewBuilder()->setLayout(false);
        if($this->request->is('post')){
            $this->redirect("/dashboard");
        }
        
    }

}
