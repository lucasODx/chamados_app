<html>

<head>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body>
    
<?php print_r($answers)?>
    <div>
        <?php foreach ($data as $dt) : ?>
            <h2>Chamado n°<?= $dt['id'] ?>: <?= $dt['title'] ?>
            <?php endforeach ?>
    </div>
    <div style="margin-top: 30px;
                margin-bottom: 10px;
                border-radius: 10px;
                background-color: #f2f2f2; 
                width: 630px;
                height: 320px; 
                overflow-y: scroll; 
                overflow-x: hidden;">
        <?php foreach ($answers as $ans) : ?>
            <p style="word-break: break-all;
                  margin: 10px;
                  padding: 5px;
                  color: #f5f5f5;
                  background-color: #008ede; 
                  border-radius: 10px;">

                <?= $ans['answers'] ?>
            </p>
        <?php endforeach ?>
    </div>
    <div>
        <?php
        echo form_open("/tickets/responder/" . $dt['id']);
        echo form_textarea(array(
            "name" => "textBox",
            "id" => "textBox",
            "class" => "form-control",
            'rows'  => '5',
            'cols' => '80'
        ));
        echo form_button(array(
            "class" => "btn btn-primary",
            "type" => "submit",
            "content" => "Atualizar chamado"
        ));
        echo form_close();
        ?>
    </div>
</body>

</html>