<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Les incidents renseignés</title>
    <link href="ressource/css/bootstrap.css" rel="stylesheet">
    <?php include "entity/Connection.php" ?>
    <?php $database = new Connection("localhost", "root", "root"); ?>
    <?php
        if (isset($_GET['id']))
            $database -> deleteRow($_GET['id']);
    ?>
    <?php $database->selectAll(); ?>
</head>
<body>
<h1 style="margin-left: 10px">Visualisation des incidents enregistrés</h1>
<br/>

<div class="col-md-8">

    <table class="table table-striped table-bordered">
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Description</th>
            <th>Severite</th>
            <th width="25%">Image</th>
            <th>Operations</th>
        </tr>

        <?php while ($row = $database->getNextRow()) { ?>
            <tr>
                <td><?= $row['Id'] ?></td>
                <td><?= $row['Type'] ?></td>
                <td><?= $row['Description'] ?></td>
                <td><?= $row['Severite'] ?></td>
                <td><?php if (isset($row['Image']))?><img src="<?= $row['Image'] ?>" width="100%" height="30%"></td>
                <td>
                    <button class="btn btn-danger" onclick="location.href='Display.php?id=<?=$row['Id']?>'">Supprimer</button>
                    </input>
                </td>
            </tr>
        <?php }; ?>
    </table>
</div>
<script src="ressource/js/bootstrap.min.js"></script>
</body>
</html>