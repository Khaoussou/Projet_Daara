<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= LINK ?>style.css">
    <script src="<?= LINK ?>script1.js" defer></script>
    <title>Document</title>
</head>

<body>
    <?php

    require_once('home.html.php');

    ?>
    <div class="dflex blocH contenaire">
        <div class="dflex fdc blocG">
            <label for="">Niveau</label>
            <select name="" id="niveau">
                <option value="">Choisir un niveau</option>
                <?php foreach ($level as $row) { ?>
                    <option value="<?= $row['idGroupeNiveau'] ?>"><?= $row['libelle'] ?></option>
                <?php } ?>
            </select>
            <label for="">Groupe Discipline</label>
            <select name="gdd" id="gdd">
                <option value="0">Choisir un groupe</option>
                <option value="" id="new" style=" cursor: pointer">Nouveau</option>
                <?php foreach ($group as $key) { ?>
                    <option value="<?= $key['idGroupeDiscip'] ?>"><?= $key['libelleGroupe'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="dflex fdc blocD">
            <label for="">Classes</label>
            <select name="classe" id="classe">
                <option value=""></option>
            </select>
            <label for="">Disciplines</label>
            <input type="text" placeholder="Donner une discipline " name="discipline" id="discipline" class="diss">
            <button class="ok"> SAVE </button>
        </div>
    </div>
    <h1 class="gest-disc">Les disciplines de la classe de<span> <a href="<?php LINK ?>coef/ponderation/" id="nom" class="no-underline" style="color: #4fc3bf"> </a> </span></h1>
    <h1 class="gest-disc" style="margin-top: -1%">Decocher une discipline pour la supprimer de la classe</h1>
    <div class="blocBas contenaire">
        <form action="" class="dflex jcc aic item fw">
            
        </form>
    </div>
    <button id="update" style="font-size: 1.5rem">Mettre à jour</button>
    <div class="groupModalContenaire">
        <div class="modalGroup dflex jcc aic">
            <form action="">
                <label for="">Donner le nom du groupe</label>
                <input type="text" name="groupe" id="groupe">
            </form>
            <button type="" id="addGroupe" style="cursor: pointer">Ajouter</button>
            <a href="<?= LINK ?>discipline" style="gap: 2%">
                <button type="" style="cursor: pointer">&nbsp;Annuler</button>
            </a>
        </div>
    </div>
</body>

</html>