<?php

class LoginModel extends CI_Model {

    public function checkLogin($email, $password) {
        //query the table 'users' and get the result count
        // $this->db->where('email', $email);
        // $this->db->where('password', $password);
        // $query = $this->db->get('users');
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $query = $this->db->query($sql);
            //return $query;
        return $query->num_rows();
    }

}
