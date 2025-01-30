<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nom"];
    $surname = $_POST["prenom"];
    $dob = $_POST["date_naiss"];
    $position = $_POST["poste"];

    // Calculer l'âge
    $dobDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dobDate)->y;

    if ($age < 18) {
        die("Erreur : Seules les personnes majeures (18 ans ou plus) peuvent être ajoutées comme employés.");
    }

    // Ajouter l'employé à la base de données
    // Exemple de connexion à la base de données :
    // $conn = new mysqli("localhost", "username", "password", "database");
    // $query = "INSERT INTO employees (name, surname, dob, position) VALUES ('$name', '$surname', '$dob', '$position')";
    // $conn->query($query);
    // $conn->close();

    echo ("L'employé a été ajouté avec succès.");
}
?>