<?php

class UserModel extends CI_Model{
    public function get_all_user(){
        //get all data from users table and return to controller
        $query = $this->db->get('users');
        return $query->result();
    }

    function get_users($limit, $offset) {
        
        if ($offset > 0) { //create offset using limit
            $offset = ($offset - 1) * $limit;
        }
        
        $result['rows'] = $this->db->get('users', $limit, $offset); //get data from users table using limit and offset
        $result['num_rows'] = $this->db->count_all_results('users'); //count all data from table users
        
        return $result; //return value to controller
    }

    public function add_new_user($data){
        //get the data from controller and insert into the table 'users'
        return $this->db->insert('users', $data);
    }

    public function get_single_user($id){
            
            //get all the value of id(send from controller) from users using query and return to controller
            $this->db->select('*'); 
            $this->db->from('users');            
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row_array();
    }

    public function updateuser($user, $id){
            //search the id in users table which sends from controller and update the rows with new users values
            $this->db->where('users.id', $id);
            return $this->db->update('users', $user);
    }

    public function deleteuser($id){
            //delete the entire row of id from users table which sends from controller 
            $this->db->where('users.id', $id);
            return $this->db->delete('users');
    }
}
