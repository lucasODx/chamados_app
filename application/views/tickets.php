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
        <h1>Your tickets</h1>
        <table class="table">
            <tr class="main_row">
                <th>Id</th>
                <th>Nome</th>
                <th>Status</th>
            </tr>

            <?php foreach ($data as $dt) : ?>
                <tr>
                    <td><?= $dt['id'] ?></td>
                    <td><?= $dt['title'] ?></td>
                    <td><?= $dt['status'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>