<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index($page = "dashboard")
    {
        $db = \Config\Database::connect();
        
        // echo '<pre>'; print_r($db_query->getResult()[0]->user_name);die;

        $data["title"] = "test_LPS";
        $data["page"] = $page;
        if($page=="user_list"){
            $data["title"] = "User List";
            $data["user_data"] =  $db->query('select * from users')->getResult() ;
        }
        return view("admin/index",$data);
    }

 
    
}
