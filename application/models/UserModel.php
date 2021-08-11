<?php

class UserModel extends CI_Model
{
    function login($username,$password)
    {
        $data = array(
            'username' => $username,
            'password' => $password
        );
        return $this->db->get_where('users', $data)->num_rows()>0;
    }

}
