<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
    <title>Document</title>
</head>

<body>

    <div class="ajoutNiveau">
        <form action="http://localhost:8080/insertlevelGroup" method="post" class="dfex jcc aic form">
            <label for="">Ajouter un groupe de niveau &nbsp;</label>
            <input name="nomGroupeNiveau" type="text">
            <button type="submit" name="save" class="bout">Enregistrer</button>
        </form>
    </div>
    <i class="fa-solid fa-plus add add-color btn-add"></i>

    <?php

    require_once('home.html.php');

    ?>

    <h3>Voici l'ensemble des groupes de niveau</h3>
    <div class="tableContent">
        <table class="table">

            <tr>
                <th>Nom groupe</th>
                <th>Action</th>
            </tr>
            <?php foreach ($level as $res) { ?>

                <tr>
                    <td> <?= $res['libelle'] ?> </td>
                    <td>
                        <a href="/classe?id=<?= $res['idGroupeNiveau'] ?>"
                        class="fa-solid fa-circle-info" style="color: #1e3050;"></a>
                    </td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>