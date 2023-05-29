<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<body>
    <form action="" method="post" class="dfex jcc aic form">
        <label for="">Ajouter une année &nbsp;</label>
        <input name="libelle" type="text">
        <button type="submit" class="bout">Enregistrer</button>
    </form>
    <?php

    require_once('home.html.php');

    ?>

    <div class="tableContent">
    <table class="table">

    <tr>
    <th>Libelle</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
    <?php foreach ($results as $res) { ?>
        <tr>
        <td> <?= $res['libelle']?> </td>
        <td> <?= $res['status']?> </td>
        <td>
            <a href="/update?id=<?= $res['idYear']?>"
                class="fa-sharp fa-solid fa-pen-to-square" style="color: #183153;"></a>
            <a href="/delete?id=<?= $res['idYear']?>"
                class="fa-solid fa-trash" style="color: #183153;"></a>
        </td>
        </tr>
    <?php } ?>

    </table>
    </div>
    <div class="modal2 dflex">
        <div class="modal-contenaire dflex fdc">
            <div class="modal-header dflex jcc aic">
                <h3>Faites votre modification</h3>
            </div>
            <div class="modal-body">
                <form action="http://localhost:8080/update" id="id-form" method="post" class="dfex jcc aic fdc">
                    <span class="dflex jcsb">
                        <label for="">Annee Scolaire</label>
                        <input type="text" name="an" class="input" value="<?php foreach ($libs as $key) {
                                echo $key['libelle'];
                        } ?> ">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    </span>
                    <span class="dflex jcc bouton">
                        <button class="save" type="submit">Enregistrer</button>
                        <button class="cancel"> <a href="/listean">Annuler</a> </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
