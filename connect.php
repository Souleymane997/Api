<?php
    session_start();
     //Connexion et Sélection de la base de données
    //  $dblink = mysqli_connect('localhost','root','','ahlelo_db');
    $dblink = mysqli_connect('localhost','root','','sysgesco');
     //Vérification de la connexion
    if($dblink->connect_errno != 0){
        echo "Erreur de connexion à la base de données";
        echo (mysqli_error($dblink));
        die();
    }

    $dblink -> set_charset("utf8");

    // $req = "SELECT statut FROM server_etat ";
    // $resultat = mysqli_query($dblink, $req);
    // $index = mysqli_fetch_assoc($resultat);

    // $_SESSION['etat_server'] = $index['statut'];

?>