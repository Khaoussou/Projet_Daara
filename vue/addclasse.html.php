<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= LINK ?>style.css">
    <script src="script.js" defer></script>
    <title>Document</title>
</head>

<body>

    <i class="fa-solid fa-plus add add-classe"></i>

    <?php

    require_once('home.html.php');

    ?>
    <h3>Voici l'ensemble des classes de ce niveau</h3>
    <div class="tableContent">
        <table class="table">

            <tr>
                <th> Nom </th>
                <th> Effectif </th>
                <th> Action </th>
            </tr>
            <?php foreach ($classes as $res) { ?>

                <tr>
                    <td> <?= $res['nomClasse'] ?> </td>
                    <td> <?= $res['effectif'] ?> </td>
                    <td>
                        <a href="<?= LINK ?>student/<?= $res["idClasse"] ?>" class="fa-solid fa-circle-info" style="color: #1e3050;"></a>
                    </td>
                </tr>

            <?php } ?>

        </table>
    </div>
    <div class="modal1 dflex">
        <div class="modal-contenaire dflex fdc">
            <div class="modal-header dflex jcc aic">
                <h3>Rempliser les champs !</h3>
            </div>
            <div class="modal-body">
                <form action="<?= LINK ?>addClasse" id="id-form" method="post" class="dfex jcc aic fdc">
                    <span class="dflex jcsb">
                        <label for="">Nom classe</label>
                        <input type="text" name="nom" class="input">
                    </span>
                    <span class="dflex jcsb">
                        <label for="">Effectif</label>
                        <input type="number" name="effectif" class="input">
                    </span>
                    <span class="dflex jcc bouton">
                        <?php
                            if (isset($_SESSION['ClasseExist'])) {
                                echo ($_SESSION['ClasseExist']);
                                unset($_SESSION['ClasseExist']);
                            }
                        ?>
                        <button class="save" type="submit">Enregistrer</button>
                        <button class="cancel"> <a href="<?= LINK ?>classeroom/<?= $_SESSION['idgrouplevel'] ?>">Annuler</a> </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</body>

</html>