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

    <a href="<?= LINK ?>addstudent" class="fa-solid fa-plus add ajout-eleve"></a>

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

    <div class="modal dflex">
        <div class="modal-contenaire dflex fdc">
            <div class="modal-header dflex jcc aic">
                <h3>Rempliser les champs !</h3>
            </div>
            <div class="modal-body">
                <form action="<?= LINK ?>add" id="id-form" method="post" class="dfex jcc aic fdc">
                <span class="dflex jcsb">
                        <label for="">Photo</label>
                        <input type="file" name="nom" class="input">
                    </span>
                    <span class="dflex jcsb">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Date de naissance</label>
                        <input type="date" name="date" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Lieu de naissance</label>
                        <input type="text" name="lieu" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Numero</label>
                        <input type="text" name="numero" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Telephone</label>
                        <input type="text" name="phone" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Sexe</label>
                        <label for="">M</label>
                        <input type="radio" name="sexe" value="M" class="input">
                        <label for="">F</label>
                        <input type="radio" name="sexe" value="F" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Type</label>
                        <select name="type" id="Type" class="type">
                            <option value="0">Choisir le type d'élève</option>
                            <option value="1">Interne</option>
                            <option value="2">Externe</option>
                        </select>
                    </span>
                    <span class="dflex jcc bouton">
                        <button class="save" type="submit">Enregistrer</button>
                        <button class="cancel"> <a href="<?= LINK ?>classe/student/<?= $_SESSION['id'] ?>">Annuler</a> </button>
                    </span>
                </form>
            </div>
        </div>
    </div>

</body>

</html>