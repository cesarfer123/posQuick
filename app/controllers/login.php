<?php

$errors=[];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=new User();

    if($row=$user->where(["email"=>$_POST["email"]],"users")){
        if(password_verify($_POST["password"],$row[0]["password"])){
            authenticate($row[0]);
            redirect("home");
        }else{
            $errors["password"]="Password Incorrecto";
        }
    }else{
        $errors["email"]="Email Incorrecto";
    }
}

require views_path("auth/login");