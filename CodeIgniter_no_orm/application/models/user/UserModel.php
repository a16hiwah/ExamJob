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
        
        // $result['rows'] = $this->db->get('users', $limit, $offset); //get data from users table using limit and offset
        // $result['num_rows'] = $this->db->count_all_results('users'); //count all data from table users
        $query1 = "SELECT * FROM users LIMIT $limit OFFSET $offset";
        $query2 = "SELECT COUNT(*) FROM users";

        $result['rows'] = $this->db->query($query1); //get data from users table using limit and offset
        $result['num_rows'] = $this->db->count_all_results('users'); //count all data from table users
        
        return $result; //return value to controller
    }

    public function add_new_user($data){
        //get the data from controller and insert into the table 'users'
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $created = $data['created'];
        $modified = $data['modified'];
        $sql = "INSERT INTO users(name, email, password, created, modified) VALUES('$name', '$email', '$password', '$created', '$modified')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_single_user($id){
            
            //get all the value of id(send from controller) from users using query and return to controller
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $query = $this->db->query($sql);
            return $query->row_array();
    }

    public function updateuser($user, $id){
            //search the id in users table which sends from controller and update the rows with new users values
            $name = $user['name'];
            $email = $user['email'];
            //$password = $user['password'];
            $modified = $user['modified'];
            $sql = "UPDATE users SET name = '$name', email = '$email', modified = '$modified' WHERE id = '$id'";
            $query = $this->db->query($sql);
            return $query;
    }

    public function deleteuser($id){
            //delete the entire row of id from users table which sends from controller 
            $sql = "DELETE FROM users WHERE id = '$id'";
            $query = $this->db->query($sql);
            return $query;
    }
}
