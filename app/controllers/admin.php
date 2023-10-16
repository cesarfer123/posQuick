<?php

$tab=$_GET["tab"] ?? "dashboard";

if($tab=="products"){
    $productClass=new Product();
    $products=$productClass->query("select * from products order by id desc");
}

if($tab=="sales"){
    $salesClass=new Product();
    $sales=$salesClass->query("select * from sales order by id desc");
}

if($tab=="users"){
    $usersClass=new Product();
    $users=$usersClass->query("select * from users order by id desc");
}

if(Auth::access('supervisor')){

    require views_path('admin/admin'); 
}else{
    Auth::setMessage("You dont have access to the admin page");
    require views_path('auth/denied'); 
}
