<?php 

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {  
        $db = \Config\Database::connect();  
        $data["title"] = "User List";
        $data["user_data"] =  $db->query('select * from users')->getResult() ;
        
        return view("admin/user/user_list",$data);
    }

    public function edit($user_id)
    {
        $db = \Config\Database::connect();
        if($_POST){ 

            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_role = $_POST['user_role'];
            $user_status = $_POST['user_status'];
            $user_modified = date('Y-m-d H:i:s');
            $insert = $db->query("update users set user_name='$user_name', user_role='$user_role', user_status='$user_status', user_modified='$user_modified' where user_id=$user_id");
            return true;
        }
        $data["title"] = "User Edit";
        $data["user_data"] =  $db->query("select * from users where user_id = $user_id")->getRow() ; 
        return view("admin/user/user_edit",$data);
    }

    public function add()
    { 
        if($_POST){ 
            $db = \Config\Database::connect();  
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_role = $_POST['user_role'];
            $user_status = $_POST['user_status'];
            $user_created = date('Y-m-d H:i:s');
            $insert = $db->query("insert into users(user_name, user_email, user_role, user_status, user_created) values('$user_name', '$user_email', '$user_role', '$user_status', '$user_created')");
            // echo print_r($_POST);
            return true;
        }
        $data["title"] = "User Add";  
        return view("admin/user/user_add",$data);
    }

    public function delete()
    { 
        if($_POST){ 
            $db = \Config\Database::connect();  
            $user_id = $_POST['user_id']; 
            $delete = $db->query("DELETE FROM users WHERE user_id= $user_id");
            echo $delete;
            return true;
        } 
    }
    
}
