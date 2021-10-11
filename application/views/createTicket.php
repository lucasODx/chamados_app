<html>

<head>
    <meta charset="utf-8">
    <title>Ticket Plus</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
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
        "class" => "btn btn-primary",
        "type" => "submit",
        "content" => "Criar"
    ));

    echo form_close();
    ?>
    <?php if ($this->session->flashdata("success")) : ?>
        <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
        <?
            redirect('/tickets/chamados');
        ?>
    <?php endif ?>
</body>

</html>