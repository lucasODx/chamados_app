<?php

class Tickets extends CI_Controller
{
	public function chamados()
	{
		$this->load->model("chamados_model");
		$userId = $this->session->userdata;
		$role = '';
		foreach ($userId as $usr) {
			$userId = $usr['userId'];
			$role = $usr['roles'];
		}
		$tickets = $this->chamados_model->tickets($userId, $role);
		$tickets['data'] = $tickets;

		$this->load->view('tickets', $tickets);
	}

	public function aceitar($ticketId)
	{
		$userId = $this->session->userdata;
		foreach ($userId as $usr) {
			$userId = $usr['userId'];
		}
		$this->load->model("chamados_model");
		$this->chamados_model->acceptTicket($ticketId, $userId);
		redirect('/tickets/chamados');
	}

	public function fechar($ticketId)
	{
		$this->load->model("chamados_model");
		$this->chamados_model->finishTicket($ticketId);
		redirect('/tickets/chamados');
	}

	public function ler($ticketId)
	{
		$this->load->model("chamados_model");
		$ticket = $this->chamados_model->readTicket($ticketId);
		$ticket['data'] = $ticket;
		$this->load->view('ticket', $ticket);
		$this->pegarRespostas($ticketId);
	}

	public function responder($ticketId)
	{
		$userId = $this->session->userdata;
		foreach ($userId as $usr) {
			$userId = $usr['userId'];
		}

		$answerFromUser = $this->input->post("textBox");

		$this->load->model("chamados_model");
		$this->chamados_model->answerTicket($ticketId, $answerFromUser, $userId);

		redirect('/tickets/ler/' . $ticketId);
	}

	public function pegarRespostas($ticketId)
	{
		$this->load->model("chamados_model");
		$answers = $this->chamados_model->readAnswers($ticketId);
		$answers['answers'] = $answers;
		$this->load->view('ticket', $answers);
	}
}
