/*Validation des formulaires*/

/*Page ajouter.php*/
console.log('Start');

var formAdd = document.forms["formAdd"];
var formAddId = document.getElementById('formAdd');

if (undefined != formAdd){
    formAddId.addEventListener("submit", function(e){
        //Pas de rafraichissement lors du submit
        e.preventDefault();
    
        var xhttp = new XMLHttpRequest();
    
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var submitTest = 1;
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
                var manuelInput = document.getElementById('manuel');
                var manuel = manuelInput.value;
    
                /*Lieux d'achat */
                var adresseRadio = document.getElementById('adresse_radio');
                var urlRadio = document.getElementById('url_radio');
                
                if (adresseRadio.checked && adresse == ""){
                    adresseInput.classList.add('emptyInput');
                    submitTest = 0;
                } else {
                    adresseInput.classList.remove('emptyInput');
                }
                if (urlRadio.checked && url == ""){
                    urlInput.classList.add('emptyInput');
                    submitTest = 0;
                } else {
                    urlInput.classList.remove('emptyInput');
                }
                if (nom == ""){
                    nomInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    nomInput.classList.remove('emptyInput');
                }
                if (reference == ""){
                    referenceInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    referenceInput.classList.remove('emptyInput');
                }
                if (categorie == ""){
                    categorieInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    categorieInput.classList.remove('emptyInput');
                }
                if (date_achat == ""){
                    date_achatInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    date_achatInput.classList.remove('emptyInput');
                }
                if (date_fin_garantie == ""){
                    date_fin_garantieInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    date_fin_garantieInput.classList.remove('emptyInput');
                }
                if ((prix == "") || (isNaN(prix) == true)){
                    prixInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    prixInput.classList.remove('emptyInput');
                }
                if (conseil_entretien == ""){
                    conseil_entretienInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    conseil_entretienInput.classList.remove('emptyInput');
                }
                if (ticket_achat == ""){
                    ticket_achatInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    ticket_achatInput.classList.remove('emptyInput');
                }
                if (manuel == ""){
                    manuelInput.classList.add('emptyInput');
                    submitTest = 0;
                }else {
                    manuelInput.classList.remove('emptyInput');
                }
                if (submitTest == 1){
                    formAddId.submit();
                }
                
            }
        };
        xhttp.open("POST", "ajouter.php", true);
        xhttp.send();
    });
}

