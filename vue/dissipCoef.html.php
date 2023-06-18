<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= LINK ?>style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?= LINK ?>script2.js" defer></script>
    <title>Document</title>
</head>

<body>

    <?php

    require_once('home.html.php');

    ?>

    <h3 style="color: #324960f8; font-size: 2rem">
    <a style="color: #183153; text-decoration: none;" href="<?= LINK ?>classe/student/<?= $idClasse ?>">
        <?= $nom ?>
    </a>
    </h3>
    <div class="tableContent">
        <table class="table">

            <tr>
                <th>Disciplines</th>
                <th>Ressources</th>
                <th>Examen</th>
                <th>Remove</th>
            </tr>
            <?php foreach ($subject as $s) { ?>
            <tr>
                <td><?= $s['libelleDiscipline'] ?></td>
                <td>
                    <input type="number" idDissip="<?= $s['idDiscipline'] ?>" class="note nRess" value="<?= $s['Ressource'] ?>">
                </td>
                <td class="td">
                    <input type="number" idDissip="<?= $s['idDiscipline'] ?>" class="note nExam" value="<?= $s['Examen'] ?>">
                </td>
                <td>
                    <a href="<?= LINK ?>supp/<?= $s['idDiscipline'] ?>" class="fa-solid fa-trash " style="color: #183153;"></a>
                </td>
            </tr>
            <?php } ?>
            <input type="hidden" value="<?= $idClasse ?>" id="current-classe">
            <button class="update" style="font-size: 1.5rem">
                Mettre à jour
            </button>
        </table>

    </div>
</body>