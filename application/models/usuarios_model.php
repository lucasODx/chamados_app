<?php

class Usuarios_Model extends CI_Model{

    public function login($userId, $password){
        $this->db->where("userId", $userId);
        $this->db->where("password", $password);
        $user = $this->db->get("users")->row_array();
        return $user;
    }
}