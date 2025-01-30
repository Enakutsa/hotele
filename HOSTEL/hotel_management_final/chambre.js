document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("ajouterchambre");
  const roomList = document.getElementById("roomlist");

  // changer les chambres au chargement de la page

  fetchRooms();

  // Gestionnaire d'évènement pour ajouter une chambre

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    // envoyer les donner au backend pour ajouter une chambre

    fetch("backend/chambre.php? action=add", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("la chambre a été ajouter avec succes");
          fetchRooms(); //actualiser la liste des chambres
        } else {
          alert("Erreur lors de l'ajout de la chambre");
        }
      });
  });
  // fonction pour changer les chambres

  function fetchRooms() {
    fetch("backent/chambre.php? acton=get")
      .then((response) => response.json())
      .then((data) => (roomList.innerHTML = ""));
    if (data.length) {
      data.forEach((room) => {
        const div = document.createElement("div");

        div.textcontent = `chambre ${room.numero} : ${room.nbre_lits} lits, ${room.prix} fcfa`;

        roomList.appendChild(div);
      });
    } else {
      roomList.textContent = "Aucune chambre trouvée.";
    }
  }
});
