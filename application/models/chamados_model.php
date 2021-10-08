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
            $this->db->where("status", 'analisando');
            $acceptedTickets = $this->db->get("ticket")->result_array();

            $this->db->where("!support");
            $tickets = $this->db->get("ticket")->result_array();

            $data[0] = $acceptedTickets;
            $data[1] = $tickets;
        }
        return $data;
    }

    public function acceptTicket($ticketId, $userId)
    {
        $data = array(
            'status' => 'analisando',
            'support' => $userId
        );

        $this->db->where("id", $ticketId);
        $this->db->update('ticket', $data);
        return true;
    }

    public function finishTicket($ticketId)
    {
        $data = array(
            'status' => 'fechado'
        );

        $this->db->where("id", $ticketId);
        $this->db->update('ticket', $data);
        return true;
    }

    public function readTicket($ticketId)
    {
        $this->db->where("id", $ticketId);
        $ticket = $this->db->get("ticket")->row_array();
        $data[0] = $ticket;
        return $data;
    }

    public function answerTicket($ticketId, $answerFromUser, $userId)
    {
        $data = array(
            'answers' => $answerFromUser,
            'ticket_id' => $ticketId,
            'answer_user' => $userId
        );

        $this->db->insert('ticket_answers', $data);
    }

    public function readAnswers($ticketId)
    {
        $this->db->where('ticket_id', $ticketId);
        $answersFromTicket = $this->db->get('ticket_answers')->result_array();
        $answersFromTicket[0] = $answersFromTicket;
        return $answersFromTicket;
    }
}
