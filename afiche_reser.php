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



// selectionner les reservations par jours et par chambres

$sql = "select c.id_chambre, r.date_arriveé, r.date_depart, sum(r.nombre_personne) as totalpersonnes, sum(r.prix_total) as total_revenu
from resérvation r
join chambre c on r.id_chambre = c.id_chambre
group by c.numero_chambre, r.date_arriveé
";

$result = $conn->query($sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport des reservation</title>
    <link rel="stylesheet" href="style.css">
 
</head>
<body>
   <h1 class="rapport">Rapport des reservations</h1> 

<table border="1">
    <tr>
        <th>Numero de chambre</th>
        <th>Date d'arrivée</th>
        <th>Date de départ</th>
        <th>Total des personnes</th>
        <th>Total des Revenus(FCFA)</th>
    </tr>

<?php
    while ($row = $result->fetch_assoc()){?>
    <tr>
        <td>
            <?= $row['id_chambre']; ?>
        </td> 
        <td> <?= $row['date_arriveé']; ?>
        </td>
        <td> <?= $row['date_depart']; ?>
        </td>
        <td class="resulte"> <?= $row['totalpersonnes']; ?>
        </td>
        <td class="result"> <?=  number_format($row['total_revenu'], 2);?>
        </td>
    </tr>

<?php } ?>





</table>
</body>
</html>

<?php
$conn->close();
?>