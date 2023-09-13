<?php
/**
 * database class
 */
class Database{

    protected function db_connect(){
        $DBNAME="pos_db";
        $DBUSER="root";
        $DBPASS="";
        $DBDRIVER="mysql";
    
        try{
            $con=new PDO("$DBDRIVER:host=localhost;dbname=$DBNAME",$DBUSER,$DBPASS);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $con;
    }

    public function query($query,$data=array()){
 
        $con=$this->db_connect();
        $stm=$con->prepare($query);
        $check=$stm->execute($data);
        if($check){
            $result=$stm->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result)>0){
                return $result;
            }
        }
    
        return false;
    
    }
    
}
