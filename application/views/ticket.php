<html>

<head>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">

</head>

<body>
    <div>
        <?php foreach ($data as $dt) : ?>
            <h2>Chamado n°<?= $dt['id'] ?>: <?= $dt['title'] ?>
            <?php endforeach ?>
    </div>

    <div id="chatbox" style="
                display:flex;
                flex-direction:column;
                margin-top: 30px;
                margin-bottom: 10px;
                border-radius: 10px;
                background-color: #f2f2f2; 
                width: 630px;
                height: 320px; 
                overflow-y: scroll; 
                overflow-x: hidden;">
        <?php foreach ($answers as $ans) : ?>
            <div style="
                display: flex;
                flex-direction: column;
                <?php
                echo (($userId == $ans['answer_user']) ?
                    'align-items: flex-end;' :
                    'align-items: flex-start;');
                ?>">
                <div>
                    <?php if ($ans['type'] == 'picture') : ?>
                        <div><img style="
                            width: 200px; 
                            height: auto;
                            margin: 5px;
                            padding: 3px;
                            border: 1px solid #E7E5F3;
                            border-radius: 10px;
                            background-color: white;" src="<?= base_url('assets/images/' . $ans['answers']) ?>" />
                        </div>

                    <?php else : ?>
                        <div>
                            <p style="
                            <?php
                            echo (($userId == $ans['answer_user']) ?
                                'color: #f5f5f5; background-color: #008ede;' :
                                'color: #2b2b2b; background-color: #dbdbdb;');
                            ?>
                            word-break: break-all;
                            width: 250px;
                            margin: 10px;
                            padding: 5px;
                            border-radius: 10px;">
                                <?= $ans['answers'] ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div>
        <?php
        if ($data[0]['status'] !== 'fechado') {

            echo form_open_multipart("/tickets/responder/" . $dt['id']);
            echo form_textarea(array(
                "name" => "textBox",
                "id" => "textBox",
                "class" => "form-control",
                'rows'  => '5',
                'cols' => '80'
            ));
            echo '<input 
                    style=
                        "float: right; 
                        margin-top: 15px;" 
                    type="file"
                    action="/tickets/responder/" 
                    name="pictureSend" 
                    size="20" />';

            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "Atualizar chamado"
            ));
            echo form_close();
        }
        ?>
    </div>
</body>

</html>