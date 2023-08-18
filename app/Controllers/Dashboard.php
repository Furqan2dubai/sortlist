<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    { die;
        $data["title"] = "dashboard"; 
        return view("admin/dashboard",$data);
    }

 
    
}
