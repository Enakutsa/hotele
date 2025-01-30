document.addEventListener("DOMContentLoaded", function(){
    const form = document.getElementById("personne_form");
    const annuler_b = document.getElementById("annuler");

    annuler_b.addEventListener("click", function(){
        // rafraichir la page
        form.reset();
        //afficher un message
        alert("L'opération a été annulé");
    })

})