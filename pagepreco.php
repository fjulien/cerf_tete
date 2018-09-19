<?php

    //Formulaire
    $name = $lastname = $email = $phone = $nameErr = $lastnameErr =$emailErr = $phoneErr= "";

    function test_input($variable) 
    {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);
        return $variable;
    }

    // Partie obligation de remplir + correction PHP
    if (empty($_POST['nom']))
        {
            $nameErr = "Veuillez rentrer un nom";
        }

        else {
            $name = test_input($_POST['nom']);
            if (!preg_match('/^[a-zA-Z ]*$/', $name)){
            $nameErr = "Seuls les lettres et espaces sont tolérés";}
            }

    if (empty($_POST['prenom']))
        {
            $lastnameErr = "Veuillez rentrer un prénom";
        }
        else {
            $name = test_input($_POST['prenom']);
            if (!preg_match('/^[a-zA-Z ]*$/', $name)){
            $lastnameErr = "Seuls les lettres et espaces sont tolérés";}
            }

     if (empty($_POST['email'])) 
        {
        $emailErr = "Email requis";
        } 
        else {
            $email = test_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format d'email invalide";}
             }   

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="formulairecss.css" />
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <a class="navbar-brand text-orange" href="pagepreco.php">WILD X</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Retour au site</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <div class="container-fluid backG">
        <div class="form">
                <h2> Je précommande mon Cerf-Tête !</h2>
            <br>
            <hr>
            <br>
            <div class="row justify-content-md-center">
                <div class="row justify-content-md-center confirmation">
                    <?php     if ($nameErr  === "" && $lastnameErr === "" && $emailErr  === "") 
                             {
                                echo 'Enregistrement terminé un Email de confirmation a été envoyé !';
                            }?>
                </div>
            </div>
            <form action="pagepreco.php" method="post">
                <br>
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <label for="nom">Nom</label>
                        <input class="form-control" type="text" name="nom" id="nom" placeholder="Musk" value="<?php if(isset($_POST['nom'])) {echo $_POST['nom'];}?>"
                            required />
                        <div class="erreur">
                            <?php echo $nameErr;?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="prenom">Prénom</label>
                        <input class="form-control" type="text" name="prenom" id="prenom" placeholder="Elan" value="<?php if(isset($_POST['prenom'])) {echo $_POST['prenom'];}?>"
                            required />
                        <div class="erreur">
                            <?php echo $lastnameErr;?>
                            <br>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <label for="email">Adresse email</label>
                        <input class="form-control" type="email" name="email" id="email" required placeholder="@" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>" />
                        <div class="erreur">
                            <?php echo $emailErr;?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone">Téléphone</label>
                        <input class="form-control" type="phone" name="phone" id="phone" required pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$"
                            placeholder="&#128241;" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone'];}?>" />
                    </div>
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <div class="form-group container-fluid">
                        <label for="exampleFormControlTextarea1"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Commentaire"></textarea>
                    </div>
                </div>
                <div>
                    <input type="checkbox" id="scales" name="feature" value="scales" required />
                     <label for="conditionsDeVentes">J'accepte les conditions de vente et je demande le dossier de précommande !</label>
                </div>
                <br>
                <input type="submit" class="btn btn-outline-dark btn-sm">
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>

</html>