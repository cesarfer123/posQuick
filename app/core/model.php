<?php

class Model extends Database
{
    
    protected function get_allowed_columns($data){

        if(!empty($this->allowed_columns)){

            foreach ($data as $key => $value) {
                // recorre el post
                // in_array - verifica si la key esta en el segundo parametro (array)
                if(!in_array($key,$this->allowed_columns)){
                    // elimina la key que no encuentra en data
                    unset($data[$key]);
                }
            }
    
        }

        return $data;
    }   

    public function insert($data){

            // $query="insert into users (username,email,password,date,role) values (:username,:email,:password,:date,:role)";
            // show($data);die;
            $clean_array=$this->get_allowed_columns($data);
            $keys=array_keys($clean_array);
            $query="insert into $this->table";
            // implode - une elementos de un array separandolo con el primer parametro que se le pase
            $query.="(".implode(",",$keys) . ") values";
            $query.="(:".implode(",:",$keys) . ")";
            $db=new Database();
            $db->query($query,$clean_array);

    }

    public function update($id,$data){

        // $query="udpate users set id=:id, name=:name where id=$id";
        $clean_array=$this->get_allowed_columns($data,$this->table);
        $keys=array_keys($clean_array);

        $query="update $this->table set ";
        
        foreach ($keys as $column) {
            $query.=$column. "=:" .$column . ",";
        }
        $query=trim($query,",");
        $query.=" where id=:id";
        $clean_array["id"]=$id;    
        $db=new Database();
        $db->query($query,$clean_array);

    }


    public function delete($id){

        $query="delete from $this->table where id=:id limit 1";
        $clean_array["id"]=$id;    
        $db=new Database();
        $db->query($query,$clean_array);

    }
    
    public function where($data,$limit=10,$offset=0,$order="desc",$order_column="id"){

            // "select * from users where email=:email && password=:password"
            $keys=array_keys($data);
            $query="select * from $this->table where ";
            
            foreach ($keys as $key) {
                $query.="$key=:$key && ";
            }
            $query=trim($query,"&& ");
            $query.=" order by $order_column $order limit $limit offset $offset";
            $db=new Database();
            return $db->query($query,$data);
    
   
    }

    public function getAll($limit=10,$offset=0,$order="desc",$order_colum="id"){

            $query="select * from $this->table order by $order_colum $order limit $limit offset $offset";

            $db=new Database();

            return $db->query($query);
    
   
    }

    public function first($data){

        // "select * from users where email=:email && password=:password"
        $keys=array_keys($data);
        $query="select * from $this->table where ";
        
        foreach ($keys as $key) {
            $query.="$key=:$key && ";
        }
        $query=trim($query,"&& ");
        $db=new Database();
        if($res=$db->query($query,$data)){

            return $res[0];
        }

        return false;

    }
}
