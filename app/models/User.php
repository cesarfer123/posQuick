<?php

class User extends Model{

    protected $table="users";

    protected  $allowed_columns=[
        "username",
        "email", 
        "password",
        "role",
        "gender",
        "image",
        "date",
    ];


    public function validate($data,$id=null){

        $errors=[];

        // validando usuario
        if(empty($data["username"])){
            $errors["username"]="Username is required";
        }else if(!preg_match("/^[a-zA-z]+$/",$data["username"])){
            $errors["username"]="Only letters allowed in username";
        }

        // validando email
        if(empty($data["email"])){
            $errors["email"]="Email is required";
        }else if(!filter_var($data["email"],FILTER_VALIDATE_EMAIL)){
            $errors["email"]="Email is not valid";
        }

        // validando password
        if(!$id){
        
            if(empty($data["password"])){
                $errors["password"]="Password is required";
            }else if($data["password"]!==$data["password_retype"]){
                $errors["password_retype"]="Passwords do not match";
            }else if(strlen($data["password"])<8){
                $errors["password"]="Password must be at least 8 character long";
            }
        }else{

            if(!empty($data["password"])){
                if($data["password"]!==$data["password_retype"]){
                $errors["password_retype"]="Passwords do not match";
                }else if(strlen($data["password"])<8){
                    $errors["password"]="Password must be at least 8 character long";
                }
            }
        }


        return $errors;
    }



}