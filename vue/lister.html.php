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
    <script src="script.js" defer></script>
    <title>Document</title>
</head>

<body>
    
    <a href="/addstudent" class="fa-solid fa-plus add ajout-eleve"></a>

    <?php

    require_once('home.html.php');

    ?>

    <h3>Voici l'ensemble des apprenants de cette classe</h3>
    <div class="tableContent">
        <table class="table">

            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>BornDay</th>
                <th>Sexe</th>
                <th>Type</th>
                <th>Photo</th>
                <th>idClasse</th>
            </tr>
            <?php foreach ($eleve as $res) { ?>
                <tr>
                    <td> <?= $res['nom'] ?> </td>
                    <td> <?= $res['prenom'] ?> </td>
                    <td> <?= $res['bornDay'] ?> </td>
                    <td> <?= $res['sexe'] ?> </td>
                    <td> <?= $res['type'] ?> </td>
                    <td> <?= $res['photo'] ?> </td>
                    <td> <?= $res['idClasseRoom'] ?> </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>