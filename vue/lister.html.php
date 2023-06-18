<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= LINK ?>style.css">
    <script src="<?= LINK ?>script3.js" defer></script>
    <title>Document</title>
</head>

<body>

    <a href="<?= LINK ?>addstudent" class="fa-solid fa-plus add ajout-eleve"></a>

    <?php

    session_start();
    require_once('home.html.php');

    ?>
    <h3><?= $nom ?> (<?= $_SESSION['year'][0]['libelle'] ?>)</h3>
    <h3>Effectif: </h3>
    <h3>Moyenne classe 13</h3>
    <div class="dflex bloc jcc aic">
        <button style="cursor: pointer; width: 10%; height: 30px; position: absolute; left: 26%">
            <a class="no-underline" style="color: black" href="<?= LINK ?>niveau/classeroom/<?= $_SESSION['idlevelgroup'] ?>">
                Retour
            </a>
        </button>
        <button style="cursor: pointer; width: 10%; height: 30px">
            <a class="no-underline" style="color: black" href="<?= LINK ?>coef/ponderation/<?= $_SESSION['id'] ?>">
                Coef
            </a>
        </button>
    </div>
    <div class=".div dflex jcc aic" style="gap: 5%; width: 30%; position: absolute; right: 18%;">
        <select name="" id="">
            <?php foreach ($semestre as $sem) { ?>
                <option value="<?= $sem["idSemestre"] ?>"><?= $sem["SemestreName"] ?></option>
            <?php } ?>
        </select>
        <select name="" id="discip">
            <option value="">Discipline</option>
            <?php foreach ($discClass as $key) { ?>
                <option value="<?= $key["idDiscipline"] ?>"><?= $key["libelleDiscipline"] ?></option>
            <?php } ?>
        </select>
        <select name="" id="select-note">
            <option value="">Note de</option>
            <option value="0">Ressource</option>
            <option value="1">Examen</option>
        </select>
    </div>
    <div class="tableContent dflex jcc aic">
        <table class="table eleve">

            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            <?php foreach ($eleve as $res) { ?>
                <tr class="tr">
                    <td>
                        <img src="2808514-un-eleve-de-maternelle-ecrit-et-lit-un-livre-tout-en-apprenant-dans-la-classe-concept-illustrationle-pour-l-education-et-la-retour-a-l-ecole-des-enfants-isoles-sur-fond-blanc-vectoriel.jpg" alt="">
                    </td>
                    <td> <?= $res['nom'] ?> </td>
                    <td> <?= $res['prenom'] ?> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>
                        <input type="number" id="input" style="width: 12%; height: 30px; font-size: 1rem" name="">
                        <span id="span">/</span>
                    </td>
                </tr>
            <?php } ?>
            <input type="hidden" value="<?= $_SESSION['id'] ?>" id="current-classe">
        </table>
    </div>
    <button id="" style="font-size: 1.5rem; margin-left: 89%; cursor: pointer; padding: 5px;">Enregistrer</button>

</body>

</html>