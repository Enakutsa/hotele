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
$prenom = $_POST['prenom'];
$date_arrive = $_POST['date_arrive'];


// recuperation de la requete

$sql = "INSERT INTO client(nom_client, prenom_client, date_arriver) values ('$nom', '$prenom', $date_arrive)";

if($conn->query($sql) === TRUE){

    echo "Le client à été ajouté avec succès 😊👍!";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }



        // fermeture de la connexion
$conn->close();
?>