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

	public function aceitar(){
		$this->load->model("chamados_model");
	}
}
