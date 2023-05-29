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

    <a href="/form" class="fa-solid fa-plus add add-classe"></a>

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
                <a href="/student?id=<?= $res["idClasse"] ?>" class="fa-solid fa-circle-info" style="color: #1e3050;"></a>
            </td>
            </tr>

        <?php } ?>

        </table>
        </div>
</body>

</html>
