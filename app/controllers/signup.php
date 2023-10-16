<?php

$errors=[];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=new User();
    $_POST["role"]="user";
    $_POST["date"]=date("Y-m-d H:i:s");

    $errors=$user->validate($_POST);
    if(empty($errors)){
        $_POST["password"]=password_hash($_POST["password"],PASSWORD_DEFAULT);
        $user->insert($_POST);
        // authenticate($_POST);
        redirect("login");
    }
}


 
if(Auth::access('admin')){

    require views_path("auth/signup");
}else{

    Auth::setMessage("only admins can create users");
    require views_path('auth/denied'); 
}
