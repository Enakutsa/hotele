document.getElementById("nombre_personne").addEventListener("input", function(){

    var nbre_personne = parseInt(this.value);
  var prixparpersonne = 2000;
  var prixtotal = nbre_personne*prixparpersonne;


  document.getElementById('prix').value = prixtotal.toFixed(2);

});