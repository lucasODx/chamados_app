<html>

<head>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <?php if ($data[0] == 'cliente') : ?>
            <?php
            echo form_open('/tickets/criar');
            echo form_button(array(
                "class" => "btn btn-primary button_create",
                "type" => "submit",
                "content" => "Criar ticket"
            ));
            echo form_close();
            ?>

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
                                "class" => "btn btn-primary",
                                "type" => "submit",
                                "content" => "Visualizar"
                            ));

                            echo form_close();

                            if ($dt['status'] !== 'fechado') {
                                echo form_open("/tickets/fechar/" . $dt['id']);
                                echo form_button(array(
                                    "class" => "btn btn-danger",
                                    "type" => "submit",
                                    "content" => "Fechar"
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
                                "class" => "btn btn-primary",
                                "type" => "submit",
                                "content" => "Visualizar"
                            ));
                            echo form_close();

                            echo form_open("/tickets/fechar/" . $dt['id']);
                            echo form_button(array(
                                "class" => "btn btn-danger",
                                "type" => "submit",
                                "content" => "Fechar"
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
                                "class" => "btn btn-primary",
                                "type" => "submit",
                                "content" => "Aceitar"
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
    </style>
</body>

</html>