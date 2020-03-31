<?php

namespace Core;

use Model\UserModel;

class Request
{
    public function http_request(){
        echo $_POST['email'] ;
        echo $_POST['password'];

    }
}