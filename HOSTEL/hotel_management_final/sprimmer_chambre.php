<?php
$servername = "localhost";
$username = "root";
$password = "";  
$dbname = "hotel"; 

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Vérification et récupération des données du formulaire
if (isset($_POST['numero'], $_POST['id_hotel'])) {
    $numero = $conn->real_escape_string($_POST['numero']);
    $id_hotel = $conn->real_escape_string($_POST['id_hotel']);
    
    // Requête de suppression
    $sql = "DELETE FROM chambre WHERE id_chambre = '$numero' AND numero = '$id_hotel'";
    
    if ($conn->query($sql) === TRUE) {
        echo "La chambre a été supprimée avec succès !";
    } else {
        echo "Erreur : " . $conn->error;
    }
} else {
    echo "Erreur : Données du formulaire manquantes.";
}

// Fermeture de la connexion
$conn->close();
?>