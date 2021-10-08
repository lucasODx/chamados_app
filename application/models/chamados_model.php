<?php

class Chamados_Model extends CI_Model
{
    public function tickets($userId, $role)
    {
echo $role;
        if ($role === 'cliente') {
            $this->db->where("creator", $userId);
            $tickets = $this->db->get("ticket")->result_array();
        } else {
            $tickets = $this->db->get("ticket")->result_array();
        }
        return $tickets;
    }
}
