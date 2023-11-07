<?php

$tab=$_GET["tab"] ?? "dashboard";

if($tab=="products"){
    $productClass=new Product();
    $products=$productClass->query("select * from products order by id desc");
}

if($tab=="sales"){
    $salesClass=new Sale();
    $limit=4;
    $pager=new Pager($limit);
    $offset=$pager->offset;

    $sales=$salesClass->query("select * from sales order by id desc limit $limit offset $offset");

    // get today's sales total
    $year=date("Y");
    $month=date("m");
    $day=date("d");
    $query="SELECT sum(total) as total FROM `sales` WHERE day(date)=$day && month(date)=$month && year(date)=$year";

    $st=$salesClass->query($query);

    $sales_total=0;
    if($st){
        $sales_total=$st[0]['total'] ?? 0;
    }

}

if($tab=="users"){
    $limit=10;
    $pager=new Pager($limit);
    $offset=$pager->offset;
    $usersClass=new Product();
    $users=$usersClass->query("select * from users order by id desc limit $limit offset $offset");

}

if(Auth::access('supervisor')){

    require views_path('admin/admin'); 
}else{
    Auth::setMessage("You dont have access to the admin page");
    require views_path('auth/denied'); 
}
