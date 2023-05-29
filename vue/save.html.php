<!DOCTYPE html>
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

        echo'<div class="tableContent">';
        echo'<table class="table">';
        echo'<tr>';
        echo '<th>idPersonne</th>';
        echo '<th>Nom</th>';
        echo '<th>Prenom</th>';
        echo '<th>Adresse</th>';
        echo '<th>Type</th>';
        echo '</tr>';
        foreach ($results as $res) {
            echo '<tr>';
            echo '<td>' . $res['idPersonne'] . '</td>';
            echo '<td>' . $res['nom'] . '</td>';
            echo '<td>' . $res['prenom'] . '</td>';
            echo '<td>' . $res['adresse'] . '</td>';
            echo '<td>' . $res['type'] . '</td>';
            echo '</tr>';
        }

        echo'</table>';
        echo'</div>';
    ?>
    <div class="modal dflex">
        <div class="modal-contenaire dflex fdc">
            <div class="modal-header dflex jcc aic">
                <h3>Rempliser les champs !</h3>
            </div>
            <div class="modal-body">
                <form action="http://localhost:8080/add" id="id-form" method="post" class="dfex jcc aic fdc">
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
                        <label for="">Sexe</label>
                        <label for="">M</label>
                        <input type="radio" name="sexe" class="input">
                        <label for="">F</label>
                        <input type="radio" name="sexe" class="input">
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Niveau</label>
                        <select name="" id="Type">
                            <option value="0">Choisir un niveau</option>
                            <option value="1">CP</option>
                            <option value="2">CM1</option>
                            <option value="3">CM2</option>
                            <option value="4">3ème</option>
                            <option value="5">Seconde</option>
                        </select>
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Classe</label>
                        <select name="classe" id="classe">
                            <option value="0">Choisir une classe</option>
                            <option value="1">CPA</option>
                            <option value="2">CM1C</option>
                            <option value="3">CM2D</option>
                            <option value="4">3èmeB</option>
                            <option value="5">Seconde</option>
                        </select>
                    </span>
                    <span class="dfle jcsb">
                        <label for="">Type</label>
                        <select name="type" id="Type">
                            <option value="0">Choisir le type d'élève</option>
                            <option value="1">Interne</option>
                            <option value="2">Externe</option>
                        </select>
                    </span>
                    <span class="dflex jcc bouton">
                        <button class="save" type="submit">Enregistrer</button>
                        <button class="cancel"> <a href="/lister">Annuler</a> </button>
                    </span>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
