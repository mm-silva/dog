<?php

namespace App\Service;

use App\Models\Client;


class AuthApi {


   
    public static function authenticate($token){
      
       
        $client = Client::where("token",$token)->first();
            
        return ($client ? false : true );
        
    }

}