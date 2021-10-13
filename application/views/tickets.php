<html>

<head>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body>
    <?php if ($_SESSION['User logged successfully']) : ?>
        <div class="container">
            <div style="float: right; margin-top: 10px;">
                <?php
                echo form_open('/login/deslogar');
                echo form_button(array(
                    "class" => "btn btn-secondary bi bi-arrow-left-square",
                    "type" => "submit",
                    "content" => " Sair"
                ));
                echo form_close();
                ?>
            </div>
            <?php if ($data[0] == 'cliente') : ?>
                <div style="float: right; margin-right: 10px;">
                    <?php
                    echo form_open('/tickets/criar');
                    echo form_button(array(
                        "class" => "btn btn-primary button-create bi-plus-circle",
                        "type" => "submit",
                        "content" => " Criar ticket"
                    ));
                    echo form_close();
                    ?>
                </div>

                <h1>Your tickets</h1>
                <table class="table">
                    <tr class="main_row">
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Status</th>
                    </tr>

                    <?php foreach ($data[1] as $dt) : ?>
                        <tr>
                            <td><?= $dt['id'] ?></td>
                            <td><?= $dt['title'] ?></td>
                            <td><?= $dt['status'] ?></td>
                            <td>
                                <?php
                                echo form_open("/tickets/ler/" . $dt['id']);
                                echo form_button(array(
                                    "class" => "btn btn-primary bi bi-eye",
                                    "type" => "submit"
                                ));

                                echo form_close();

                                if ($dt['status'] !== 'fechado') {
                                    echo form_open("/tickets/fechar/" . $dt['id']);
                                    echo form_button(array(
                                        "class" => "btn btn-danger bi bi-x-circle",
                                        "type" => "submit"
                                    ));
                                    echo form_close();
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>

            <?php endif ?>

            <?php if ($data[0] !== 'cliente') : ?>
                <h1>Your tickets</h1>
                <table class="table">
                    <tr class="main_row">
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Status</th>
                    </tr>

                    <?php foreach ($data[0] as $dt) : ?>
                        <tr>
                            <td><?= $dt['id'] ?></td>
                            <td>
                                <?= $dt['title'] ?>
                            </td>
                            <td><?= $dt['status'] ?></td>
                            <td>
                                <?php
                                echo form_open("/tickets/ler/" . $dt['id']);
                                echo form_button(array(
                                    "class" => "btn btn-primary bi bi-eye",
                                    "type" => "submit"
                                ));
                                echo form_close();

                                echo form_open("/tickets/fechar/" . $dt['id']);
                                echo form_button(array(
                                    "class" => "btn btn-success bi bi-check-square",
                                    "type" => "submit"
                                ));
                                echo form_close();
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>

                <br />

                <h1>Opened tickets</h1>
                <table class="table">
                    <tr class="main_row">
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Status</th>
                    </tr>

                    <?php foreach ($data[1] as $dt) : ?>
                        <tr>
                            <td><?= $dt['id'] ?></td>
                            <td><?= $dt['title'] ?></td>
                            <td><?= $dt['status'] ?></td>
                            <td>
                                <?php
                                echo form_open("/tickets/aceitar/" . $dt['id']);
                                echo form_button(array(
                                    "class" => "btn btn-primary bi bi-arrow-bar-up",
                                    "type" => "submit",
                                    "content" => " Aceitar"
                                ));
                                echo form_close();
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            <?php endif ?>
        </div>
        <style>
            .button_create {
                float: right;
            }
            .bi bi-arrow-bar-up{
                float: right;
            }
        </style>
    <?php else : ?>
        <h2>You must be logged to access this feature</h2>
    <?php endif; ?>
</body>

</html>