<?php

class Login extends CI_Controller
{

	public function autenticar()
	{
		$this->load->model("usuarios_model");
		$userId = $this->input->post("userId");
		$password = $this->input->post("password");
		$user = $this->usuarios_model->login($userId, $password);

		if ($user) {
			$this->session->set_userdata("User logged successfully", $user);
			$this->session->set_flashdata("success", "User logged successfully");
		} else {
			$this->session->set_flashdata("danger", "This user doesn't exists");
		}
		redirect('/');
	}

	public function deslogar()
	{
		session_destroy();
		redirect('/');
	}
}
