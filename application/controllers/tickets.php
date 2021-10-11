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
		$userId = $this->session->userdata;
		foreach ($userId as $usr) {
			$userId = $usr['userId'];
		}

		$ticket = $this->chamados_model->readTicket($ticketId);
		$answers = $this->pegarRespostas($ticketId);

		$ticket['data'] = $ticket;
		$ticket['answers'] = $answers;
		$ticket['userId'] = $userId;
		$this->load->view('ticket', $ticket);
	}

	public function responder($ticketId)
	{
		$userId = $this->session->userdata;
		foreach ($userId as $usr) {
			$userId = $usr['userId'];
		}

		$this->load->model("chamados_model");
		$answerFromUser = $this->input->post("textBox");

		if ($answerFromUser !== '') {
			$this->chamados_model->answerTicket($ticketId, $answerFromUser, $userId, 'answer');
			redirect('/tickets/ler/' . $ticketId);
		} else {
			$config["upload_path"] = "assets/images/";
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
			$this->upload->do_upload('pictureSend');
			$answerFromUser = $this->upload->data()['file_name'];

			if($answerFromUser){
				$this->chamados_model->answerTicket($ticketId, $answerFromUser, $userId, 'picture');
			}
			redirect('/tickets/ler/' . $ticketId);
		}
	}

	public function pegarRespostas($ticketId)
	{
		$this->load->model("chamados_model");
		$answers = $this->chamados_model->readAnswers($ticketId);
		return $answers;
	}
}
