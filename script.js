/*Validation des formulaires*/
/*Page ajouter.php*/
console.log('Start');

var formAdd = document.forms["formAdd"];
var formAddId = document.getElementById('formAdd');

formAddId.addEventListener("submit", function(e){
    //Pas de rafraichissement lors du submit
    e.preventDefault();

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var submitTest = 0;
            /*ADRESSE*/
            var adresseInput = document.getElementById('adresse');
            var adresse = adresseInput.value;
            /*URL*/
            var urlInput = document.getElementById('url');
            var url = urlInput.value;
            /*NOM*/
            var nomInput = document.getElementById('nom');
            var nom = nomInput.value;
            /*REFERENCE*/
            var referenceInput = document.getElementById('reference');
            var reference = referenceInput.value;
            /*CATEGORIE*/
            var categorieInput = document.getElementById('categorie');
            var categorie = categorieInput.value;
            /*DATE D ACHAT*/
            var date_achatInput = document.getElementById('date_achat');
            var date_achat = date_achatInput.value;
            /*DATE DE FIN DE GARANTIE*/
            var date_fin_garantieInput = document.getElementById('date_fin_garantie');
            var date_fin_garantie = date_fin_garantieInput.value;
            /*PRIX*/
            var prixInput = document.getElementById('prix');
            var prix = prixInput.value;
            /*CONSEIL ENTRETIEN*/
            var conseil_entretienInput = document.getElementById('conseil_entretien');
            var conseil_entretien = conseil_entretienInput.value;
            /*TICKET ACHAT*/
            var ticket_achatInput = document.getElementById('ticket_achat');
            var ticket_achat = ticket_achatInput.value;
            /*MANUEL*/
            var manuelInput = document.getElementById('manuel').value;
            var manuel = manuelInput.value;

            /*Lieux d'achat */
            var adresseRadio = document.getElementById('adresse_radio');
            console.log(adresseRadio.value);
            

            if (nom == ""){
                nomInput.classList.add('emptyInput');
            }
            if (reference == ""){
                referenceInput.classList.add('emptyInput');
            }
            if (categorie == ""){
                categorieInput.classList.add('emptyInput');
            }
            if (date_achat == ""){
                date_achatInput.classList.add('emptyInput');
            }
            if (date_fin_garantie == ""){
                date_fin_garantieInput.classList.add('emptyInput');
            }
            if (prix == ""){
                prixInput.classList.add('emptyInput');
            }
            if (conseil_entretien == ""){
                conseil_entretienInput.classList.add('emptyInput');
            }
            if (ticket_achat == ""){
                ticket_achatInput.classList.add('emptyInput');
            }
            if (manuel == ""){
                manuelInput.classList.add('emptyInput');
            }
            
        }
    };
    xhttp.open("POST", "ajouter.php", true);
    xhttp.send();
});

/*
function validateForm() {
    var formAdd = document.forms["formAdd"];
    var formAddId = document.getElementById('formAdd');
    var submitTest = 0;
    for (let i = 2; i < 11; i++ ){
        var formContant = document.querySelectorAll('.formInput');

        var formInput = formContant[i];
        
        if (formInput.value == ""){
            
            formInput.classList.add('emptyInput');
            submitTest = 1;
            
        }else{
            //Si l'input est rempli on supprimer la classe de décort
            formInput.classList.remove('emptyInput');
        }
        console.log(submitTest);
        console.log(i);
    }
    if (submitTest == 0){
        formAddId.submit;
        console.log('Submit Fait');
    } else {
        console.log('Input manquante');
    }
}
*/