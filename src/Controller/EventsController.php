<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Curl\Curl;
/**
 * Description of EventsController
 *
 * @author Lucas
 */
class EventsController extends AppController{
    
    
    
    function getByOwner(){
        
        $http = new Curl();
        
        $send = [];
        $send['user'] = 47;
        $send['fields']['user']['fields'] = ["id_user", "name", "email"];
        $send['fields']['events']['fields'] = ["id_event", "description", "name", "location", "start_time"];
        $http->setHeader("content-type", "application/json");
        $response = $http->post("$this->base_url/events/byOwner", $send);
        
        $this->set(compact("response"));
        
        
        
    }
}
