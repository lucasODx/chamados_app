<?php

class Chamados_Model extends CI_Model
{
    public function tickets($userId, $role)
    {
        if ($role === 'cliente') {
            $this->db->where("creator", $userId);
            $tickets = $this->db->get("ticket")->result_array();

            $data[0] = $role;
            $data[1] = $tickets;
        } else {
            $this->db->where("support", $userId);
            $acceptedTickets = $this->db->get("ticket")->result_array();

            $this->db->where("!support");
            $tickets = $this->db->get("ticket")->result_array();

            $data[0] = $acceptedTickets;
            $data[1] = $tickets;
        }
        return $data;
    }

    public function acceptTicket($ticketId, $userId){
        $this->db->where("id", $ticketId);
        $this->db->update('status', 'analisando');
        $this->db->update('support', $userId);
    }
}
