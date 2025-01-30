<?php

$host = "localhost"; //adresse du serveur
$username ="root"; // nom d'utilsateur
$password = "";  // mot de passe
$dbname = "hotel";  // nom de la base de données



// connexion a mysql
$conn = new mysqli($host, $username, $password, $dbname);

// verification de la connexion

if($conn ->connect_error)  
{
    die("connection échouée : ". $conn->connect_error);
}else{
    echo("connection reussie!!!");
}


// recuperer les donnes du formulaire
$id = $_POST['id'];
$age = $_POST['age'];


// recuperation de la requete

$sql = "INSERT INTO enfant(id_personne, age_enfant) values ($id, $age)";

if($conn->query($sql) === TRUE){

    echo "L'Enfant à été ajouté avec succès 😊👍!";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }



    $conn->close();
  ?>