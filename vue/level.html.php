<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <a href="<?= LINK ?>addlevel" class="fa-solid fa-plus add no-underline"></a>
    <?php

    require_once('home.html.php');

    ?>

    <div class="tableContent">
        <table class="table">

            <tr>
                <th>Niveau</th>
                <th>Action</th>
            </tr>
            <?php foreach ($results as $res) { ?>

                <tr>
                    <td> <?= $res['nomNiveau'] ?> </td>
                    <td>
                        <a href="<?= LINK ?>niveau/classe/<?= $res['idNiveau'] ?>" class="fa-solid fa-circle-info" style="color: #1e3050;"></a>
                    </td>
                </tr>

            <?php } ?>

        </table>
    </div>
</body>

</html>