<html>

<head>
    <meta charset="utf-8">
    <title>Ticket Plus</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body>
    <?php if ($_SESSION['User logged successfully']) : ?>
        <div class="container">
            <div style="width: 100%;">

                <div style="float: right; margin-right: 30px; margin-top: -30px">
                    <?php
                    echo form_open('/tickets/chamados');
                    echo form_button(array(
                        "class" => "btn btn-primary bi bi-arrow-left",
                        "type" => "submit",
                        "content" => " Voltar"
                    ));
                    echo form_close();
                    ?>
                </div>
                <h1 style="text-align: center;">Create your ticket</h1>
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; font-weight: 600;">
                <?php
                echo form_open("/tickets/criarTicket");

                echo form_label("Title", "title");
                echo form_input(array(
                    "name" => "title",
                    "id" => "title",
                    "class" => "form-control",
                    "maxlength" => "100"

                ));

                echo form_label("Description", "description");
                echo form_textarea(array(
                    "name" => "description",
                    "id" => "description",
                    "class" => "form-control",
                    'rows'  => '5',
                    'cols' => '60'
                ));

                echo form_button(array(
                    "class" => "btn btn-primary btn_create bi bi-plus-circle",
                    "type" => "submit",
                    "content" => " Criar"
                ));

                echo form_close();
                ?>
            </div>
            <?php if ($this->session->flashdata("success")) : ?>
                <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
                <?
                redirect('/tickets/chamados');
                ?>
                <?php elseif($this->session->flashdata("danger")) : ?>
                    <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
                    <?
                    redirect('/tickets/chamados');
                    ?>
            
            <?php endif ?>
        </div>
    <?php else : ?>
        <h2>You must be logged to access this feature</h2>
    <?php endif; ?>
    <style>
        .btn_create{
            float: right;
        }
    </style>
</body>

</html>