<?php

class UserModel extends CI_Model
{
    function login($username,$password)
    {
        $data = array(
            'username' => $username,
            'password' => $password
        );

        $result = $this->db->get('users')->result_array();
        $res = array();

        for($i = 0; $i < sizeof($result); $i++){
            if($result[$i]['username'] == $username && $result[$i]['password'] == $password){
                array_push($res,$result[$i]['username']);
            }
        }
        var_dump($res);
        die;
        return $this->db->get_where('users', $data)->num_rows()>0;
    }

}
