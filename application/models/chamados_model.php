<?php

class Chamados_Model extends CI_Model
{
    public function tickets($userId, $role)
    {
        if ($role === 'cliente') {
            $this->db->where("creator", $userId);
            $this->db->order_by('status', 'DESC');
            $tickets = $this->db->get("ticket")->result_array();

            $data[0] = $role;
            $data[1] = $tickets;
        } else {
            $this->db->where("support", $userId);
            $this->db->where("status", 'analisando');
            $this->db->order_by('status', 'DESC');
            $acceptedTickets = $this->db->get("ticket")->result_array();

            $this->db->where("status like 'aberto'");
            $tickets = $this->db->get("ticket")->result_array();

            $data[0] = $acceptedTickets;
            $data[1] = $tickets;
        }
        return $data;
    }

    public function createTicket($title, $description, $userId){
        $data = array(
            'creator' => $userId,
            'title' => $title,
            'status' => 'aberto'
        );

        $this->db->insert('ticket', $data);

        $ticket_data = array(
            'answers' => $description,
            'ticket_id' => $this->db->insert_id(),
            'answer_user' => $userId,
            'type' => 'answer'
        );

        $this->db->insert('ticket_answers', $ticket_data);        
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

    public function answerTicket($ticketId, $answerFromUser, $userId, $answerType)
    {
        $data = array(
            'answers' => $answerFromUser,
            'ticket_id' => $ticketId,
            'answer_user' => $userId,
            'type' => $answerType
        );

        $this->db->insert('ticket_answers', $data);
    }

    public function readAnswers($ticketId)
    {
        $this->db->where('ticket_id', $ticketId);
        $answersFromTicket = $this->db->get('ticket_answers')->result_array();
        return $answersFromTicket;
    }
}
