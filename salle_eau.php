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
$id_salle = $_POST['id_salle'];
$id_hotel = $_POST['id_hotel'];
$id_chambre = $_POST['id_chambre'];


// recuperation de la requete

$sql = "INSERT INTO salle(id_salle, id_hotell, id_chambre) values ($id_salle, $id_hotel, $id_chambre)";

if($conn->query($sql) === TRUE){

    echo ("Les données ont été enrégistré avec succès !");
    } else {
        echo ("Erreur : " . $sql . "<br>" . $conn->error);
    }


?>