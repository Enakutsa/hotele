document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("personne_form");
    const validerBouton = document.getElementById("valider");
    
    validerBouton.addEventListener("click", function(event) {
        const dob = new Date(document.getElementById("date_naiss").value);
        const today = new Date();
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();

        // Ajuster l'âge si l'anniversaire n'a pas encore été atteint cette année
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }

        if (age < 18) {
            alert("Seules les personnes majeures (18 ans ou plus) peuvent être ajoutées comme employés");
            event.preventDefault(); // Empêcher l'envoi du formulaire
        }
    });
});
