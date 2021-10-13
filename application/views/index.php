<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Ticket Plus</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>" />
	<link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
	<div id="container">
		<h1>Ticket +</h1>
		<?php
		echo form_open("/login/autenticar");

		echo form_label("User ID", "userId");
		echo form_input(array(
			"name" => "userId",
			"id" => "userId",
			"class" => "form-control",
			"maxlength" => "11"

		));

		echo form_label("Password", "password");
		echo form_password(array(
			"name" => "password",
			"id" => "password",
			"class" => "form-control",
			"maxlength" => "8"
		));

		echo form_button(array(
			"class" => "btn btn-primary",
			"type" => "submit",
			"content" => " Acessar"
		));

		echo form_close();
		?>

		<br />
		<?php if ($this->session->flashdata("success")) : ?>
			<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>

		<?php endif ?>
		<?php if ($this->session->flashdata("danger")) : ?>
			<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
		<?php endif ?>

		<?php if ($this->session->userdata("User logged successfully"))
			redirect('/tickets/chamados');
		?>
	</div>

</body>

</html>