<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    
    <?php

    require_once('home.html.php');

    echo '<div class="tableContent">';
    echo '<table class="table">';

    echo '<tr>';
    echo '<th>idGroupeNiveau</th>';
    echo '<th>Niveau</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    foreach ($results as $res) {
        echo '<tr>';
        echo '<td>' . $res['idGroupeNiveau'] . '</td>';
        echo '<td>' . $res['nomNiveau'] . '</td>';
        echo '<td>' .
            '<a href="/classe">
            <i class="fa-solid fa-circle-info" style="color: #1e3050;"></i>
            </a>' . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
    ?>
    <div class="modal2 dflex">
        <div class="modal-contenaire dflex fdc">
            <div class="modal-header dflex jcc aic">
                <h3>Rempliser les champs !</h3>
            </div>
            <div class="modal-body">
                <form action="http://localhost:8080/addLevel" id="id-form" method="post" class="dfex jcc aic fdc">
                    <span class="dflex jcsb">
                        <label for="">Nom niveau</label>
                        <input type="text" name="nom" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Choisir un groupe</label>
                        <select name="groupe" id="Type">
                            <option value="0">Voici les groupes </option>
                            <option value="1">Primaire</option>
                            <option value="2">Secondaire inferieur</option>
                            <option value="3">Secondaire superieur</option>
                        </select>
                    </span>
                    <span class="dflex jcc bouton">
                        <button class="save" type="submit">Enregistrer</button>
                        <button class="cancel"> <a href="/level">Annuler</a> </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</body>

</html> -->