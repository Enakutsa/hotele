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
$nom = $_POST['nom'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$messages = $_POST['message'];


// recuperation de la requete

$sql = "INSERT INTO contact(nom, tel, email, messages) values ('$nom', '$tel', '$email', '$messages')";


if($conn->query($sql) === TRUE){

    echo "La message est bien reçu😊👍!";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


?>