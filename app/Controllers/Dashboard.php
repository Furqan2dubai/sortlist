<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    { 
        $data["title"] = "dashboard"; 
        return view("admin/dashboard",$data);
    }

 
    
}
