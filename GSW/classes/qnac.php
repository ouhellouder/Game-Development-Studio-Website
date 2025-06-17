<?php
require("database.php");

class Qna extends Database {
    private $db;

    public function __construct(){
        $this->db = $this->connect();
    }

    public function Qnagoin(){
        try{
            $query =  $this->db->query("SELECT * FROM qna");
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
        finally{
            $this->connection=null;
        }
    }
}