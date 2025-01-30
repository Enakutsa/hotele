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
$numero = $_POST['numero'];
$nbre_lits = $_POST['nbre_lits'];
$prix = $_POST['prix'];
$id_hotel = $_POST['id_hotel'];

// recuperation de la requete

$sql = "INSERT INTO chambre(numero_chambre, nbre_lits, prix_chambre, numero) values ($numero, $nbre_lits, $prix, $id_hotel)";



if($conn->query($sql) === TRUE){

    echo "La chambre à été ajouté aves succès😊👍!";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }




    // supprimer chambre



    
    // fermeture de la connexion
$conn->close();
?>