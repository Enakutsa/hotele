const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const PORT = 3000;

// Middleware
app.use(bodyParser.json());

// Données simulées
let chambres = [
  { id: 1, type: 'standard', prix: 50, occupee: false },
  { id: 2, type: 'deluxe', prix: 100, occupee: false },
  { id: 3, type: 'suite', prix: 200, occupee: false },
];

let reservations = [];

// Routes

// Récupérer les informations sur les chambres
app.get('/api/chambres', (req, res) => {
  res.json(chambres);
});

// Ajouter une réservation
app.post('/api/reservations', (req, res) => {
  const { nom, email, telephone, chambreId, dateArrivee, dateDepart } = req.body;

  // Vérifier si la chambre est disponible
  const chambre = chambres.find((c) => c.id === chambreId);
  if (!chambre) {
    return res.status(404).json({ message: 'Chambre non trouvée' });
  }
  if (chambre.occupee) {
    return res.status(400).json({ message: 'Chambre déjà occupée' });
  }

  // Ajouter la réservation
  const reservation = {
    id: reservations.length + 1,
    nom,
    email,
    telephone,
    chambreId,
    dateArrivee,
    dateDepart,
    prix: chambre.prix,
  };
  reservations.push(reservation);

  // Marquer la chambre comme occupée
  chambre.occupee = true;

  res.status(201).json({ message: 'Réservation réussie', reservation });
});

// Calcul du chiffre d'affaires entre deux dates
app.post('/api/chiffre-affaires', (req, res) => {
  const { dateDebut, dateFin } = req.body;

  const debut = new Date(dateDebut);
  const fin = new Date(dateFin);

  const chiffreAffaires = reservations
    .filter((r) => {
      const arrivee = new Date(r.dateArrivee);
      const depart = new Date(r.dateDepart);
      return arrivee >= debut && depart <= fin;
    })
    .reduce((total, r) => total + r.prix, 0);

  res.json({ chiffreAffaires });
});

// Démarrer le serveur
app.listen(PORT, () => {
  console.log(`Serveur lancé sur http://localhost:${PORT}`);
});
