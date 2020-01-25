//jquery pour traiter l'alerte sur commentaire et l'affichage du msg

//détecter validation formulaire "Signaler un commentaire comme abusif"

$('.submit').submit (function (event) {
	event.preventDefault(); //permet de ne pas recharger la page
	console.log("clic détecté");
	let $form=$(this); //this = formulaire sur lequel on a cliqué

	//requête ajax
	$.ajax({
		url:$form.attr('action') //attr renvoie à l'attribut action

//afficher msg lors de l'évènement
	}) .done(function(){ //dès que la requête a réussi
		
		$form.find('p').text('Votre alerte a bien été enregistrée');
	})
});