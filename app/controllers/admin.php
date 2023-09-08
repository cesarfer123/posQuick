<?php

$tab=$_GET["tab"] ?? "dashboard";

if($tab=="products"){
    $products_class=new Product();
    $products=$products_class->query("select * from products order by id desc");
}

require views_path('admin/admin'); 