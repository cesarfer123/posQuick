<?php

defined("ABSPATH") ? "" : die();

// capture ajax data

$row_data=file_get_contents("php://input");
if(!empty($row_data)){
	// json_decode devuelve un array asociativo
	$OBJ=json_decode($row_data,true);
	if(is_array($OBJ)){
		if($OBJ["data_type"]=="search"){

			$productsClass=new Product();

			if(!empty($OBJ["text"])){
				// search
				$barcode=$OBJ['text'];
				$text="%".$OBJ["text"]."%";
				$query="select * from products where description like :find || barcode = :barcode limit 10";
				$rows=$productsClass->query($query,['find'=>$text,'barcode'=>$barcode]);
			}else{
				// get all
				$rows=$productsClass->getAll();
			}

			if($rows){
				foreach ($rows as $key => $row) {
					$rows[$key]["description"]=strtoupper($row["description"]);
					$rows[$key]["image"]=crop($row["image"]);
				}

				$info["data_type"]="search";
				$info["data"]=$rows;
				echo json_encode($info);
			}
		}
	}
}
