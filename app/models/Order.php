<?php


class Order {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function rowCount(){
        $this->db->query('SELECT * FROM orders');
        return $this->db->rowCount();
      
    }

    public function showList($data){
        // Get variables here, because bind function not working on this variables
        $order = $data['order'];
        $sort = $data['sort'];
    
        if(!isset($data['status'])){
        $this->db->query("SELECT * FROM orders  ORDER BY $order $sort LIMIT :starting_limit, :limit");
        }elseif($data['status'] == 1){
        $this->db->query("SELECT * FROM orders WHERE status = 1  ORDER BY $order $sort LIMIT :starting_limit, :limit");
        }else{
            $this->db->query("SELECT * FROM orders WHERE status = 0  ORDER BY $order $sort LIMIT :starting_limit, :limit");
        }
        $this->db->bind(':starting_limit', $data['starting_limit']);
        $this->db->bind(':limit', $data['limit']); 
       
     
        return $this->db->resultSet();
    }

    public function listCount($data) {
        if(!isset($data['status'])){
            $this->db->query("SELECT * FROM orders");
        }elseif($data['status'] == 1){
            $this->db->query("SELECT * FROM orders WHERE status = 1");
        }else{
            $this->db->query("SELECT * FROM orders WHERE status = 0");
        }
        return $this->db->rowCount();
        
    }

}