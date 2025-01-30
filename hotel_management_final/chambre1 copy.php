<?php
include 'connection.php'

//ajouter une chambre
function ajouterchambre($numero, $nbre_lits, $prix){
    global $conn;
    $query = " insert into chambre 
    (numero_chambre,nbre_lits, prix_chambre) values (?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("iids",$numero, $nbre_lits, $prix);
    return $stmt->execute();
}



//recupere toutes les chambres
function getchambre(){
    global $conn;
    $query = "select * from chambre";
    $result = $conn->query($query);
     
    return $result->fetch_all(MYSQLI_ASSOC);
}



// supprimer une chambre


function supprimerchambre(){
    global $conn;
    $query = "delete from chambre where id =?";
    $stmt = $conn->prepare($query);
    return $stmt->execute();
}

?>