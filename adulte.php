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
$numero = $_POST['id'];
$id_hotel = $_POST['id_hotel'];
$age = $_POST['age'];


// recuperation de la requete

$sql = "INSERT INTO adulte(id_personne, id_hotell, age_adulte) values ($numero, $id_hotel, $age)";


if($conn->query($sql) === TRUE){

    echo "Les données ont été enrégistré avec succès😊👍!";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>