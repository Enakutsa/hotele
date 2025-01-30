<!-- <?php
$servername ="localhost";
$username ="root";
$password = "";  
$dbname = "hotel"; 

//connection à la base de donnée
$conn = new mysqli($servername, $username, $password, $dbname);


// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
} else {
    echo ("Connexion réussie");
}


// Récupérer les données du formulaire
$id_personne = $_POST['id'];
$nom = $conn->real_escape_string($_POST['nom']);
$prenom = $conn->real_escape_string($_POST['prenom']);

// Requête d'insertion
$sql = "INSERT INTO personne (id_personne, nom_personne, prenom)
 VALUES ('$id_personne', '$nom', '$prenom')";

if($conn->query($sql) === TRUE){

    echo ("Les données ont été enrégistré avec succès !");
    } else {
        echo ("Erreur : " . $sql . "<br>" . $conn->error);
    }

        // fermeture de la connexion
$conn->close();
?> 







// if ($conn->query($sql) === TRUE) {
//     echo "Les données ont été enregistrées avec succès !";
// } else {
//     echo "Erreur : " . $sql . "<br>" . $conn->error;
// }

