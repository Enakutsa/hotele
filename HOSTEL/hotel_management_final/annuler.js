document.addEventListener("DOMContentLoaded", function() { 
     const form = document.getElementById("ajouterchambre");
     const annuler_boutton = document.getElementById("annuler");

     annuler_boutton.addEventListener("click", function() {
        //réinitialiser le formulaire
        form.reset();
        //rediriger vers une  autre page ou afficher un message
        alert("L'opération a été annulé");
     });
})

