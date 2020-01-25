




//détecter clic sur bouton "Signaler un commentaire comme abusif"
let clicAlert=document.getElementById("submit"); 

//ajouter un gestionnaire pour l'évènement afin d'afficher le msg
clicAlert.addEventListener("click", function (e) {
	console.log("Votre alerte a bien été enregistrée");
}); 

e.stopPropagation();

clicAlert.removeEventListener("click", msgAlert);

