<!DOCTYPE html>
<html lang="en">

<?php
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <nav>
        <h1 class="year dflex jcc aic"> <?= $_SESSION['year'][0]['libelle'] ?> </h1>
        <ul>
            <div class="img dflex fdc">
                <img src="Capture d’écran du 2023-05-27 16-14-28.png" alt="">
            </div>
            <li >
                <a href="/lister" class="no-underline" id="list" class="nav">Liste apprenant</a>
            </li>
            <li >
                <a href="/level" class="no-underline" id="service" class="nav">Liste classe et niveau</a>
            </li>
            <li >
                <a href="/listean" class="no-underline" id="contect" class="nav">Année</a>
            </li>
                <a href="/connect" class="fa-solid fa-bars logout"></a>
        </ul>
    </nav>
</body>

</html>
