<?php

class Data{
    public $severname;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $conn;
    public function __construct(){
        
        
        //creat connection  
        $this->conn  =mysqli_connect("localhost","root","","dessert");
        if($this->conn){
            echo mysqli_error($this->conn);
        }
    }//constructer

    public function getData(){
        $sql = sprintf("SELECT dessert_id,dessert_name,dessert_price,dessert_pic FROM dessert");
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)>0){
        return $result;
    }

    }


    public function getDataWhere($condition){
        $sql = sprintf("SELECT dessert_id,dessert_name,dessert_price,dessert_pic FROM dessert WHERE dessert_id = '%s'",$condition);
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)>0){
        return $result;
    }

    }
    
}
?>