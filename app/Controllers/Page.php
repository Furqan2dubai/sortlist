<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index()
    { 
        $db = \Config\Database::connect();  
        $data["title"] = "Page List";
        $data["page_data"] =  $db->query('select * from pages')->getResult() ;
        
        return view("admin/page/page_list",$data);
    }

    public function edit($page_id)
    {
        $db = \Config\Database::connect();  
        $data["title"] = "Page Edit";
        $data["page_data"] =  $db->query("select * from pages where page_id = $page_id")->getResult() ; 
        return view("admin/page/page_edit",$data);
    }
    
    public function add()
    {
        $data["title"] = "User Add";
        return view("admin/page/page_add",$data);
    }
    
}
