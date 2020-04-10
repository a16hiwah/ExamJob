<?php

class RegisterModel extends CI_Model{
    public function add_user($data){
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
}
