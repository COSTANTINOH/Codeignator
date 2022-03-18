<?php

class Main_model extends CI_Model
{
    public function test_main(){
        echo "This is model function";
    }

    public function insert($data){
        $this->db->insert('users',$data); //insert data to database;
    }

    public function fetch_users(){
        // $query = $this->db->get('users');
        // $query = $this->db->query('SELECT * FROM users ORDER BY id DESC');
        //select * from users;
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query;
    }

    public function delete_data($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
        //delete from users where id = $id;

    }

    public function fetch_single_data($id){
        $this->db->where('id', $id);
        $query = $this->db->get("users");
        return $query;
        //select from users where id = $id

        
    }

    public function update_data($data,$id){
        $this->db->where('id', $id);
        $this->db->update('users',$data);
        //update users set 
    }
}


?>