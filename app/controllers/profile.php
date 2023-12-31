<?php

$errors=[];
$user=new User();
$id=$_GET["id"] ?? Auth::get("id");
$row=$user->first(["id"=>$id]);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    // make sure only admins can make other admins
    if($_POST["role"]=="admin"){
        if(!Auth::get("role")=="admin"){
            $_POST['role']='user';
        }
    }


    $errors=$user->validate($_POST,$id);
    if(empty($errors)){
        if(empty($_POST['password'])){
            unset($_POST['password']);
            // show($_POST);die;
        }else{
            $_POST["password"]=password_hash($_POST["password"],PASSWORD_DEFAULT);
        }
        $user->update($id,$_POST);
        redirect("admin&tab=users");
    }
}


 
if(Auth::access('admin')){

    require views_path("auth/profile");
}else{

    Auth::setMessage("only admins can edit users");
    require views_path('auth/denied'); 
}
