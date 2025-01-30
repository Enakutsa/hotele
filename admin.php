<?php
$host = "localhost"; // adresse du serveur
$username = "root"; // nom d'utilisateur
$password = ""; // mot de passe
$dbname = "hotel"; // nom de la base de données

// connexion à mysql
$conn = new mysqli($host, $username, $password, $dbname);

// vérification de la connexion
if ($conn->connect_error) {
    die("connection échouée : " . $conn->connect_error);
}

// vérifier que les données POST existent
if (isset($_POST['identifiant']) && isset($_POST['password'])) {
    // récupérer les données dans le formulaire
    $identifiant = $conn->real_escape_string($_POST['identifiant']);
    $mot_de_passe = $conn->real_escape_string($_POST['password']);

    // définir le mot de passe par défaut
    $mot_de_passe_defaut = "gessie100";

    // vérifier si le mot de passe saisi correspond au mot de passe par défaut
    if ($mot_de_passe === $mot_de_passe_defaut) {
        // rediriger vers la page spécifiée par l'utilisateur
        header("Location: personne1.html"); // Remplacez "votre_page_accueil.php" par le lien de votre page
        exit(); // Assurez-vous que le script s'arrête après la redirection
    } else {
        // afficher un message d'erreur
        echo ("Erreur : Identifiant ou mot de passe incorrect. Seuls les admins peuvent accéder à cette page.");
    }
} else {
    echo ("Erreur : Veuillez remplir tous les champs.");
}

// fermeture de la connexion
$conn->close();
?>
