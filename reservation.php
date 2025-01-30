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
$nom = $conn->real_escape_string($_POST['nom']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$room = $conn->real_escape_string($_POST['room']);
$datearriver = $conn->real_escape_string($_POST['checkin']);
$datedepart = $conn->real_escape_string($_POST['checkout']);
$heurearriver = $conn->real_escape_string($_POST['heurearriver']);
$heuredepart = $conn->real_escape_string($_POST['heuredepart']);
$requests = $conn->real_escape_string($_POST['requests']);




// recuperation de la requete

$sql = "INSERT INTO resérvation(non, email, tel, type_chambre, date_arriveé, date_depart, heure_arrivé, heure_depart, demande_particulier)  
values ('$nom', '$email', '$phone', '$room', '$datearriver', '$datedepart', '$heurearriver', '$heuredepart', '$requests')";


if($conn->query($sql) === TRUE){

    echo "La chambre à été reservé avec succès😊👍 !";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }




    $conn->close();

?>