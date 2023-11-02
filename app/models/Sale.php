<?php

class Sale extends Model{

    protected $table="sales";

    protected  $allowed_columns=[
        "barcode",
        "receipt_no",
        "user_id",
        "description", 
        "qty", 
        "amount",
        "total",
        "date",
    ];


    public function validate($data, $id=null){

        $errors=[];

        // validando description
        if(empty($data["description"])){
            $errors["description"]="Sale description is required";
        }else if(!preg_match("/[a-zA-z0-9 _\-\&\(\)]+/",$data["description"])){
            $errors["description"]="Only letters allowed in description";
        }

        // validando qty
        if(empty($data["qty"])){
            $errors["qty"]="Sale quantity is required";
        }else if(!preg_match("/^[0-9]+$/",$data["qty"])){
            $errors["qty"]="quantity must be a number";
        }
        
          // validando amount
        if(empty($data["amount"])){
            $errors["amount"]="Sale amount is required";
        }else if(!preg_match("/^[0-9.]+$/",$data["amount"])){
            $errors["amount"]="amount must be a number";
        }

        // validando image
        $max_size=4;
        $size=$max_size*(1024*1024);

        if(!$id || ($id && !empty($data["image"]))){

            if(empty($data["image"])){
                $errors["image"]="Sale image is required";
            }else if(!($data["image"]["type"]=="image/jpeg" || $data["image"]["type"]=="image/png")){
                $errors["image"]="Image must be a valid JPEG or PNG";
            }else if($data["image"]["error"]>0){
                $errors["image"]="The image failed to upload. Error no.".$data["image"]["error"];                            
            }else if($data["image"]["size"]>$size){
                $errors["image"]="The Image size must be lower than " . $max_size. " MB";
            }
        }


        return $errors;
    }

}